<?php


namespace App\Api\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CreateUserResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy ("all")
 */
class CreateUserResponse extends AbstractResponse
{
    #[JMS\Expose]
    #[JMS\SerializedName("id")]
    #[JMS\Type("int")]
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}