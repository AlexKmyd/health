<?php


namespace App\Managers;


use App\Api\Requests\CreateGroupRequest;
use App\Api\Requests\CreateUserRequest;
use App\Api\Requests\EditUserRequest;
use App\Entity\User;
use App\Entity\UserGroup;
use App\Repository\UserGroupRepository;
use App\Repository\UserRepository;

class UserManager
{
    public function __construct(protected UserRepository $userRepository, protected UserGroupRepository $userGroupRepository)
    {
    }

    public function get(int|string $id)
    {
        return $this->userRepository->find($id);
    }

    public function createUser(CreateUserRequest $userRequest)
    {
        $entity = $this->userRepository->create();
        return $this->modifyUser($entity, $userRequest);
    }

    public function modifyUser(User $entity, CreateUserRequest $userRequest)
    {
        $entity->setName($userRequest->getName());
        $entity->setEmail($userRequest->getEmail());

        if ($userRequest->getGroup()){
            $group = $this->userGroupRepository->find($userRequest->getGroup());
            if (!$group) throw new \Exception("Group not found");
            $group && $entity->addUserGroup($group);
        }

        $this->userRepository->save($entity);
        return $entity;
    }

    public function delete(User $entity)
    {
        $this->userRepository->remove($entity);
    }

    public function createGroup(CreateGroupRequest $groupRequest)
    {
        $entity = $this->userGroupRepository->create();
        $entity->setName($groupRequest->getName());

        $this->userGroupRepository->save($entity);
        return $entity;
    }

    public function getGroup(int|string $id)
    {
        return $this->userGroupRepository->find($id);
    }
}