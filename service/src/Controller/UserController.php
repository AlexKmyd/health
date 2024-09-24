<?php


namespace App\Controller;

use App\Api\RequestConverter;
use App\Api\Requests\CreateUserRequest;
use App\Api\Requests\EditUserRequest;
use App\Managers\UserManager;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Helpers\ArrayHelper;

class UserController extends AbstractController
{
    public function __construct(
        protected UserManager $manager,
        protected RequestConverter $converter,
        protected ValidatorInterface $validator,
        protected SerializerInterface $serializer
    )
    {
    }

    #[Route('api/user/{id}', methods: "GET")]
    public function get($id)
    {
        $entity = $this->manager->get($id);
        return new JsonResponse($this->serializer->toArray($entity), $entity?200:404);
    }

    #[Route('api/user', methods: "POST", format: 'json')]
    public function create(Request $request)
    {
        $user = $this->converter->convert($request, CreateUserRequest::class);

        $errors = $this->validator->validate($user);
        if ($errors->count()){
            return new JsonResponse(['success' => false, 'message' => (string)$errors->get(0)], 400);
        }
        try{
            $entity = $this->manager->createUser($user);
            return new JsonResponse(['success' => true, 'id' => $entity->getId()]);
        } catch (\Throwable $e){
            return new JsonResponse(['success' => true, 'message' => $e->getMessage()], 400);
        }
    }

    #[Route('api/user/{id}', methods: "PUT", format: 'json')]
    public function edit(Request $request, $id)
    {
        $entity = $this->manager->get($id);
        if (!$entity){
            return new JsonResponse(['success' => false], 404);
        }

        $user = $this->converter->convert($request, EditUserRequest::class);
        $errors = $this->validator->validate($user);
        if ($errors->count()){
            return new JsonResponse(['success' => false, 'message' => (string)$errors->get(0)], 400);
        }

        try{
            $entity = $this->manager->modifyUser($entity, $user);
            return new JsonResponse($this->serializer->toArray($entity), 200);
        } catch (\Throwable $e){
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    #[Route('api/user/{id}', methods: "DELETE", format: 'json')]
    public function delete(Request $request, $id)
    {
        $entity = $this->manager->get($id);
        if (!$entity){
            return new JsonResponse(['success' => false], 404);
        }

        try{
            $this->manager->delete($entity);
            return new JsonResponse(['success' => true], 200);
        } catch (\Throwable $e){
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}