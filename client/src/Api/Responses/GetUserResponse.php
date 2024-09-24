<?php


namespace App\Api\Responses;

use App\Api\Responses\DTO\UserGroupDTO;
use JMS\Serializer\Annotation as JMS;

/**
 * Class GetUserResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy("all")
 */
class GetUserResponse extends AbstractResponse
{
    #[JMS\Expose]
    #[JMS\Type("string")]
    #[JMS\SerializedName("name")]
    protected $name;

    #[JMS\Expose]
    #[JMS\Type("int")]
    #[JMS\SerializedName("id")]
    protected $id;

    #[JMS\Expose]
    #[JMS\Type("string")]
    #[JMS\SerializedName("email")]
    protected $email;

    #[JMS\Expose]
    #[JMS\Type("array<App\Api\Responses\DTO\UserGroupDTO>")]
    #[JMS\SerializedName("user_groups")]
    protected $groups;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return UserGroupDTO[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }
}