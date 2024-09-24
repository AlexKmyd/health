<?php


namespace App\Api\Responses\DTO;

use JMS\Serializer\Annotation as JMS;

/**
 * Class UserGroupDTO
 * @package App\Api\Responses\DTO
 * @JMS\ExclusionPolicy ("all")
 */
class UserGroupDTO
{
    /**
     * @var string
     */
    #[JMS\Expose]
    #[JMS\Type("string")]
    #[JMS\SerializedName("name")]
    protected $name;

    /**
     * @var int
     */
    #[JMS\Expose]
    #[JMS\SerializedName("id")]
    #[JMS\Type("int")]
    protected $id;

    /**
     * @return string
     */
    public function getId(): int
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
}