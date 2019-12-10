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
     * @Rest\Get("/categories", name=".categories.index", methods={"GET"})
     *
     * @param GetService $service
     *
     * @return Response
     *
     * @throws AnnotationException
     * @throws ExceptionInterface
     */
    public function index(GetService $service)
    {
        $categories = $service->getAll();
        $categories = $this->serializer->serialize($categories);
        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/categories/{id}", name=".categories.show", methods={"GET"})
     *
     * @param GetService $service Get Service.
     * @param integer    $id
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
     * @Rest\Post("/categories/{id}", name=".categories.update", methods={"PUT"})
     *
     * @param Request       $request Request.
     * @param UpdateService $service Update Service.
     * @param integer       $id      Entity id.
     *
     * @return Response
     * @throws ExceptionInterface
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
     * @Rest\Delete("/categories/{id}", name=".users.delete", methods={"DELETE"})
     *
     * @param Request       $request
     * @param DeleteService $service
     * @param int           $id
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