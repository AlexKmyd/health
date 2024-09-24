<?php


namespace App\Api\Responses;

use App\Api\Responses\DTO\UserDTO;
use JMS\Serializer\Annotation as JMS;

/**
 * Class GetGroupUsersResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy ("all")
 */
class GetGroupUsersResponse extends GetGroupResponse
{
    /**
     * @var UserDTO[]
     */
    #[JMS\Expose]
    #[JMS\SerializedName("users")]
    #[JMS\Type("array<App\Api\Responses\DTO\UserDTO>")]
    protected $users;

    /**
     * @return UserDTO[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }
}