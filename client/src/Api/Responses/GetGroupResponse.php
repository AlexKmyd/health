<?php


namespace App\Api\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class GetGroupRequest
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy ("all")
 */
class GetGroupResponse extends AbstractResponse
{
    /**
     * @var int
     */
    #[JMS\Expose]
    #[JMS\SerializedName("id")]
    #[JMS\Type("int")]
    protected $id;

    /**
     * @var string
     */
    #[JMS\Expose]
    #[JMS\SerializedName("name")]
    #[JMS\Type("string")]
    protected $name;

    /**
     * @return int
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