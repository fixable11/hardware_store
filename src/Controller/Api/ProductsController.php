<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Model\Normalizers\PaginatorNormalizer;
use App\Model\Product\Filter\GetFilter;
use App\Model\Product\Service\CreateService;
use App\Model\Product\Service\DeleteService;
use App\Model\Product\Service\GetService;
use App\Model\Product\Service\ProductNormalizer;
use App\Model\Product\Service\UpdateService;
use App\Model\Product\UseCase\Create\CreateDto;
use App\Model\Product\UseCase\Create\CreateForm;
use App\Model\Product\UseCase\Update\UpdateDto;
use App\Model\Product\UseCase\Update\UpdateForm;
use App\Service\FileUploader;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use App\Model\Product\Entity\Product;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UsersController
 *
 * @Route("/api", name="api")
 */
class ProductsController extends AbstractFOSRestController
{
    /**
     * @var LoggerInterface $logger Logger.
     */
    private $logger;

    /**
     * @var PaginatorNormalizer $paginatorNormalizer Paginator normalizer.
     */
    private $paginatorNormalizer;

    /**
     * @var FileUploader $uploader FileUploader.
     */
    private $uploader;

    /**
     * @var SerializerInterface $serializer Serializer.
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ProductsController constructor.
     *
     * @param LoggerInterface     $logger              Logger.
     * @param PaginatorNormalizer $paginatorNormalizer Paginator normalizer.
     * @param FileUploader        $uploader
     * @param SerializerInterface $serializer
     * @param ValidatorInterface  $validator
     */
    public function __construct(
        LoggerInterface $logger,
        PaginatorNormalizer $paginatorNormalizer,
        FileUploader $uploader,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $this->logger = $logger;
        $this->paginatorNormalizer = $paginatorNormalizer;
        $this->uploader = $uploader;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * List of the products.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Product::class, groups={"product"})),
     *     )
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="products")
     * @Security(name="Bearer")
     *
     * @Rest\Get("/products", name=".products.index", methods={"GET"})
     *
     * @param GetService        $service Get products service.
     * @param Request           $request Request.
     *
     * @param ProductNormalizer $normalizer
     *
     * @return Response
     *
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function index(GetService $service, Request $request, ProductNormalizer $normalizer)
    {
        $filter = new GetFilter(
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );

        $paginator = $service->getAll($filter);

        $view = $this->view($this->paginatorNormalizer->normalize($paginator, $normalizer), 200);

        return $this->handleView($view);
    }

    /**
     * Get the specific product.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @Model(type=Product::class, groups={"product"})
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized",
     * )
     *
     * @SWG\Tag(name="products")
     * @Security(name="Bearer")
     *
     * @Rest\Get("/products/{sku}", name=".products.show", methods={"GET"})
     *
     * @param GetService        $service Get products service.
     * @param string            $sku     Product sku.
     * @param ProductNormalizer $normalizer
     *
     * @return Response
     * @throws ExceptionInterface
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function show(GetService $service, string $sku, ProductNormalizer $normalizer)
    {
        $product = $service->getBySku($sku);

        return $this->handleView($this->view($normalizer->normalizeOne($product), 200));
    }

    /**
     * Create product.
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to create product",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="sku", type="string",
     *                       example="002d6fbc-16ae-11ea-8d71-362b9e155667", description="Could be blank"
     *         ),
     *         @SWG\Property(property="name", type="string", example="Product name"),
     *         @SWG\Property(property="description", type="string", example="Product description")
     *     )
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Created",
     *     @Model(type=Product::class, groups={"product"})
     * )
     *
     * @SWG\Response(
     *     response="409",
     *     description="Conflict"
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="products")
     * @Security(name="Bearer")
     *
     * @Rest\Post("/products", name=".products.create", methods={"POST"})
     *
     * @param Request       $request Request.
     * @param CreateService $service Create service.
     *
     * @return Response
     *
     * @throws Exception
     */
    public function create(Request $request, CreateService $service)
    {
        /** @var CreateDto $createDto */
        $createDto = $this->serializer->deserialize($request->getContent(), CreateDto::class, 'json');

        $violations = $this->validator->validate($createDto);

        if (count($violations)) {
            $json = $this->serializer->serialize($violations, 'json');
            return new JsonResponse($json, 400, [], true);
        }

        if (! empty($createDto->photos)) {
            $paths = $this->uploader->upload($createDto->photos);
            $createDto->photos = $paths;
        }

        $product = $service->create($createDto);

        return $this->handleView($this->view($product, Response::HTTP_CREATED));
    }


    /**
     * Edit product.
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to create product",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="sku", type="string",
     *                       example="002d6fbc-16ae-11ea-8d71-362b9e155667", description="Could be blank"
     *         ),
     *         @SWG\Property(property="name", type="string", example="Product name"),
     *         @SWG\Property(property="description", type="string", example="Product description"),
     *         @SWG\Property(property="status", type="string", example="status_active")
     *     )
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Created",
     *     @Model(type=Product::class, groups={"product"})
     * )
     *
     * @SWG\Response(
     *     response="409",
     *     description="Conflict"
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="products")
     * @Security(name="Bearer")
     *
     * @Rest\Post("/products/{sku}", name=".products.edit", methods={"POST"})
     *
     * @param Request       $request Request.
     * @param UpdateService $service UpdateService.
     * @param string        $sku     Product sku.
     *
     * @return Response
     */
    public function edit(Request $request, UpdateService $service, string $sku)
    {
        $json = json_encode($request->request->all());
        /** @var UpdateDto $updateDto */
        $updateDto = $this->serializer->deserialize($json, UpdateDto::class, 'json');
        $updateDto->sku = $sku;
        $updateDto->photos = $request->files->get('photos');

        $violations = $this->validator->validate($updateDto);

        if (count($violations)) {
            $json = $this->serializer->serialize($violations, 'json');
            return new JsonResponse($json, 400, [], true);
        }

        if (! empty($updateDto->photos)) {
            $paths = $this->uploader->upload($updateDto->photos);
            $updateDto->photos = $paths;
        }

        $product = $service->update($updateDto);

        return $this->handleView($this->view($product, Response::HTTP_OK));
    }



    /**
     * Delete product.
     *
     *
     * @SWG\Response(
     *     response=204,
     *     description="No content"
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Not found"
     * )
     *
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="products")
     * @Security(name="Bearer")
     *
     * @Rest\Delete("/products/{sku}", name=".products.delete", methods={"DELETE"})
     *
     * @param Request       $request Request.
     * @param DeleteService $service Delete service.
     * @param string        $sku     Product sku.
     *
     * @return Response
     */
    public function delete(Request $request, DeleteService $service, string $sku)
    {
        $service->delete($sku, $this->uploader->getTargetDirectory());

        return $this->handleView($this->view([], Response::HTTP_NO_CONTENT));
    }
}
