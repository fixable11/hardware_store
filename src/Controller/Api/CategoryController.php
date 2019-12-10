<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Model\Category\Service\CategorySerializer;
use App\Model\Category\Service\CreateService;
use App\Model\Category\Service\DeleteService;
use App\Model\Category\Service\GetService;
use App\Model\Category\Service\UpdateService;
use App\Model\Category\UseCase\Create\CreateDto;
use App\Model\Category\UseCase\Create\CreateForm;
use App\Model\Category\UseCase\Update\UpdateDto;
use App\Model\Category\UseCase\Update\UpdateForm;
use Doctrine\Common\Annotations\AnnotationException;
use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Model\Category\Entity\Category;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use App\Model\Product\Entity\Product;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 * Class CategoryController
 *
 * @Route("/api", name="api")
 */
class CategoryController extends AbstractFOSRestController
{
    /**
     * @var LoggerInterface $logger Logger.
     */
    private $logger;

    /**
     * @var CategorySerializer $serializer Category serializer.
     */
    private $serializer;

    /**
     * CategoryController constructor.
     *
     * @param LoggerInterface    $logger     Logger.
     * @param CategorySerializer $serializer Category serializer.
     */
    public function __construct(LoggerInterface $logger, CategorySerializer $serializer)
    {
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * List of all categories.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Category::class, groups={"category"})),
     *     )
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @Rest\Get("/categories", name=".categories.index", methods={"GET"})
     *
     * @param GetService $service Get service.
     *
     * @return Response
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function index(GetService $service)
    {
        $categories = $service->getAll();
        $categories = $this->serializer->serialize($categories);
        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

    /**
     * Get the specific category.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @Model(type=Category::class, groups={"category"})
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized",
     * )
     *
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @Rest\Get("/categories/{id}", name=".categories.show", methods={"GET"})
     *
     * @param GetService $service Get Service.
     * @param integer    $id      Entity id.
     *
     * @return Response
     *
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function show(GetService $service, int $id)
    {
        try {
            $category = $service->getById($id);
            $category = $this->serializer->serializeOne($category);
            return $this->handleView($this->view($category, 200));
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage(), ['exception' => $e]);
            return $this->handleView(
                $this->view(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND)
            );
        }
    }

    /**
     * Create product.
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to create category",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="name", type="string", description="Category name", example="Category name"),
     *         @SWG\Property(property="parentId", type="string", description="Parent category id (optional)"
     *          , example="1")
     *     )
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Created",
     *     @Model(type=Category::class, groups={"category"})
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
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @Rest\Post("/categories", name=".categories.create", methods={"POST"})
     *
     * @param Request       $request Request.
     * @param CreateService $service Create Service.
     *
     * @return Response
     *
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function create(Request $request, CreateService $service)
    {
        $createDto = new CreateDto();

        $form = $this->createForm(CreateForm::class, $createDto);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if (! $form->isSubmitted() || ! $form->isValid()) {
            return $this->handleView($this->view($form->getErrors()));
        }

        try {
            $category = $service->create($createDto);
            $category = $this->serializer->serializeOne($category);
            return $this->handleView($this->view($category, Response::HTTP_CREATED));
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage(), ['exception' => $e]);
            return $this->handleView(
                $this->view(['message' => $e->getMessage()], Response::HTTP_CONFLICT)
            );
        }
    }

    /**
     * Update category.
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to update category",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="name", type="string", description="Category name", example="Category name"),
     *         @SWG\Property(property="parentId", type="string", description="Parent category id (optional)"
     *          , example="1")
     *     )
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Created",
     *     @Model(type=Category::class, groups={"category"})
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
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @Rest\Post("/categories/{id}", name=".categories.update", methods={"PUT"})
     *
     * @param Request       $request Request.
     * @param UpdateService $service Update Service.
     * @param integer       $id      Entity id.
     *
     * @return Response
     *
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function update(Request $request, UpdateService $service, int $id)
    {
        $updateDto = new UpdateDto($id);

        $form = $this->createForm(UpdateForm::class, $updateDto);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if (! $form->isSubmitted() || ! $form->isValid()) {
            return $this->handleView($this->view($form->getErrors()));
        }

        try {
            $category = $service->update($updateDto);
            $category = $this->serializer->serializeOne($category);
            return $this->handleView($this->view($category, Response::HTTP_OK));
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage(), ['exception' => $e]);
            return $this->handleView(
                $this->view(['message' => $e->getMessage()], Response::HTTP_CONFLICT)
            );
        }
    }

    /**
     * Delete category.
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
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @Rest\Delete("/categories/{id}", name=".users.delete", methods={"DELETE"})
     *
     * @param Request       $request Request.
     * @param DeleteService $service DeleteService.
     * @param integer       $id      Entity id.
     *
     * @return Response
     */
    public function delete(Request $request, DeleteService $service, int $id)
    {
        try {
            $service->delete($id);
            return $this->handleView($this->view([], Response::HTTP_NO_CONTENT));
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage(), ['exception' => $e]);
            return $this->handleView(
                $this->view(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND)
            );
        }
    }
}
