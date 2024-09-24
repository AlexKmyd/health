<?php


namespace App\Services;


use App\Api\ApiClient;
use App\Api\Requests\CreateGroupRequest;
use App\Api\Requests\CreateUserRequest;
use App\Api\Requests\DeleteUserRequest;
use App\Api\Requests\EditUserRequest;
use App\Api\Requests\GetGroupUsersRequest;
use App\Api\Requests\GetUserRequest;
use App\Api\Responses\CreateGroupResponse;
use App\Api\Responses\CreateUserResponse;
use App\Api\Responses\DeleteUserResponse;
use App\Api\Responses\EditUserResponse;
use App\Api\Responses\GetGroupUsersResponse;
use App\Api\Responses\GetUserResponse;

class ApiService
{
    protected $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function createUser(string $name, string $email, int $group = null)
    {
        $request = new CreateUserRequest();
        $request->setName($name);
        $request->setEmail($email);
        $group && $request->setGroup($group);

        return $this->apiClient->request($request)->resolve(new CreateUserResponse());
    }

    public function editUser(int|string $id, ?string $name = null, ?string $email = null, int $group = null)
    {
        $request = new EditUserRequest($id);
        !empty($name) && $request->setName($name);
        !empty($email) && $request->setEmail($email);
        $group && $request->setGroup($group);

        return $this->apiClient->request($request)->resolve(new EditUserResponse);
    }

    public function getUser(int $id)
    {
        $request = new GetUserRequest($id);
        return $this->apiClient->request($request)->resolve(new GetUserResponse);
    }

    public function deleteUser(int $id)
    {
        $request = new DeleteUserRequest($id);
        return $this->apiClient->request($request)->resolve(new DeleteUserResponse());
    }

    public function createGroup(string $name)
    {
        $request = new CreateGroupRequest($name);
        return $this->apiClient->request($request)->resolve(new CreateGroupResponse());
    }

    public function groupReport(int $group)
    {
        $request = new GetGroupUsersRequest($group);
        return $this->apiClient->request($request)->resolve(new GetGroupUsersResponse());
    }
}