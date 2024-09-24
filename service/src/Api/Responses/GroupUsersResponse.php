<?php


namespace App\Api\Responses;

use App\Api\Responses\DTO\UserDTO;
use App\Entity\User;
use App\Entity\UserGroup;
use JMS\Serializer\Annotation as JMS;

/**
 * Class GroupUsersResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy("all")
 */
class GroupUsersResponse
{
    #[JMS\Expose]
    #[JMS\SerializedName("id")]
    #[JMS\Type("int")]
    protected $id;

    #[JMS\Expose]
    #[JMS\SerializedName("name")]
    #[JMS\Type("string")]
    protected $name;

    #[JMS\Expose]
    #[JMS\SerializedName("users")]
    #[JMS\Type("array<App\Api\Responses\DTO\UserDTO>")]
    protected $users = [];

    public function __construct(UserGroup $group)
    {
        $this->id = $group->getId();
        $this->name = $group->getName();
        /** @var User $user */
        foreach ($group->getUsers() as $user){
            $dto = new UserDTO();
            $dto->setId($user->getId());
            $dto->setName($user->getName());
            $dto->setEmail($user->getEmail());
            $this->users[] = $dto;
        }
    }
}