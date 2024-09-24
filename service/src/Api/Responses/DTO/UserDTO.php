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
    #[JMS\SerializedName("id")]
    #[JMS\Type("int")]
    protected $id;

    #[JMS\Expose]
    #[JMS\SerializedName("name")]
    #[JMS\Type("string")]
    protected $name;

    #[JMS\Expose]
    #[JMS\SerializedName("email")]
    #[JMS\Type("string")]
    protected $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
}