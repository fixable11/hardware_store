<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Model\User\Entity\User;
use App\Model\User\Service\UserSerializer;
use App\Model\User\Service\UserService;
use App\Model\User\UseCase\Create\CreateDto;
use App\Model\User\UseCase\Create\CreateForm;
use App\Model\User\UseCase\Delete\DeleteDto;
use App\Model\User\UseCase\Update\UpdateDto;
use App\Model\User\UseCase\Update\UpdateForm;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\ORM\EntityManagerInterface;
use DomainException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UsersController
 *
 * @Route("/api", name="api")
 */
class UsersController extends AbstractFOSRestController
{
    /**
     * @var LoggerInterface $logger Logger.
     */
    private $logger;

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var UserSerializer
     */
    private $serializer;

    /**
     * UsersController constructor.
     *
     * @param LoggerInterface $logger      Logger.
     * @param UserService     $userService User service.
     * @param UserSerializer  $serializer  User serializer.
     */
    public function __construct(LoggerInterface $logger, UserService $userService, UserSerializer $serializer)
    {
        $this->logger = $logger;
        $this->userService = $userService;
        $this->serializer = $serializer;
    }

    /**
     * List of the users.
     *
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @Model(type=User::class, groups={"user"})
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="users")
     * @Security(name="Bearer")
     *
     * @Rest\Get("/users", name=".users.index", methods={"GET"})
     *
     * @return Response
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function index()
    {
        $users = $this->userService->getAll();
        $data = $this->serializer->serialize($users);
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    /**
     * Create user.
     *
     * @Rest\Post("/users", name=".users.create", methods={"POST"})
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to create user",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="email", type="string", example="test@gmail.com"),
     *         @SWG\Property(property="password", type="string", example="123123"),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Created",
     *     @Model(type=User::class, groups={"user"})
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
     * @SWG\Tag(name="users")
     * @Security(name="Bearer")
     *
     * @param Request $request Request.
     *
     * @return RedirectResponse|Response
     */
    public function create(Request $request)
    {
        $createDto = new CreateDto();
        $form = $this->createForm(CreateForm::class, $createDto);

        $data = json_decode($request->getContent(), true);

        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $user = $this->userService->create($createDto);
                return $this->handleView($this->view($user, Response::HTTP_CREATED));
            } catch (\DomainException $e) {
                $this->logger->error($e->getMessage(), ['exception' => $e]);

                return $this->handleView(
                    $this->view(['message' => $e->getMessage()], Response::HTTP_CONFLICT)
                );
            }
        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Update user.
     *
     * @Rest\Put("/users/{id}", name=".users.update", methods={"PUT"})
     *
     * @SWG\Parameter(
     *     in="body",
     *     type="string",
     *     name="data",
     *     required=true,
     *     description="Data to update user",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Property(property="email", type="string", example="test@gmail.com"),
     *         @SWG\Property(property="password", type="string", example="123123"),
     *         @SWG\Property(property="firstName", type="string", example="First name"),
     *         @SWG\Property(property="lastName", type="string", example="Last name"),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=204,
     *     description="Updated",
     *     @Model(type=User::class, groups={"user"})
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
     * @SWG\Tag(name="users")
     * @Security(name="Bearer")
     *
     * @param Request $request Request.
     * @param User    $user    User entity.
     *
     * @return RedirectResponse|Response
     */
    public function edit(Request $request, User $user)
    {
        $updateDto = UpdateDto::fromUser($user);
        $form = $this->createForm(UpdateForm::class, $updateDto);

        $data = json_decode($request->getContent(), true);

        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->userService->update($updateDto);
                return $this->handleView($this->view(['Updated'], Response::HTTP_NO_CONTENT));
            } catch (\DomainException $e) {
                $this->logger->error($e->getMessage(), ['exception' => $e]);
                return $this->handleView(
                    $this->view(['message' => $e->getMessage()], Response::HTTP_CONFLICT)
                );
            }
        }

        return $this->handleView($this->view($form->getErrors()));
    }


    /**
     * Delete user.
     *
     * @Rest\Delete("/users/{id}", name=".users.update", methods={"DELETE"})
     *
     * @SWG\Response(
     *     response=204,
     *     description="Deleted",
     * )
     *
     * @SWG\Response(
     *     response="401",
     *     description="Unauthorized"
     * )
     *
     * @SWG\Tag(name="users")
     * @Security(name="Bearer")
     *
     * @param Request $request Request.
     * @param string  $id      User id.
     *
     * @return RedirectResponse|Response
     */
    public function delete(Request $request, string $id)
    {
        $deleteDto = new DeleteDto($id);

        try {
            $this->userService->delete($deleteDto);
            return $this->handleView($this->view(['Deleted'], Response::HTTP_NO_CONTENT));
        } catch (\DomainException $e) {
            $this->logger->error($e->getMessage(), ['exception' => $e]);
            return $this->handleView(
                $this->view(['message' => $e->getMessage()], Response::HTTP_CONFLICT)
            );
        }
    }
}
