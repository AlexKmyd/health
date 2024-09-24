<?php


namespace App\Controller;


use App\Api\RequestConverter;
use App\Api\Requests\CreateGroupRequest;
use App\Api\Responses\GroupUsersResponse;
use App\Managers\UserManager;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GroupController extends AbstractController
{
    public function __construct(
        protected UserManager $manager,
        protected RequestConverter $converter,
        protected ValidatorInterface $validator,
        protected SerializerInterface $serializer
    )
    {
    }

    #[Route('api/group/{id}', methods: "GET")]
    public function get($id)
    {
        $entity = $this->manager->getGroup($id);
        return new JsonResponse($this->serializer->toArray($entity), $entity?200:404);
    }

    #[Route('api/group', methods: "POST", format: 'json')]
    public function create(Request $request)
    {
        $group = $this->converter->convert($request, CreateGroupRequest::class);
        $errors = $this->validator->validate($group);
        if ($errors->count()){
            return new JsonResponse(['success' => false, 'message' => (string)$errors->get(0)]);
        }
        $entity = $this->manager->createGroup($group);
        return new JsonResponse(['success' => true, 'id' => $entity->getId()]);
    }

    #[Route('api/group/users/{id}', methods: "GET", format: 'json')]
    public function withUsers(Request $request, $id)
    {
        $group = $this->manager->getGroup($id);
        if (!$group){
            return new JsonResponse(['success' => false, 'message' => (string)"Group not found"], 404);
        }

        $response = new GroupUsersResponse($group);

        return new JsonResponse($this->serializer->toArray($response), 200);
    }
}