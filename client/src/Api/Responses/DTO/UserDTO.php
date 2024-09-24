<?php


namespace App\Api\Responses\DTO;

use JMS\Serializer\Annotation as JMS;

/**
 * Class UserDTO
 * @package App\Api\Responses\DTO
 * @JMS\ExclusionPolicy ("all")
 */
class UserDTO
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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}