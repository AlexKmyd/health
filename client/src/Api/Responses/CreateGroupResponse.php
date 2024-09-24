<?php


namespace App\Api\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CreateGroupResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy ("all")
 */
class CreateGroupResponse extends AbstractResponse
{
    #[JMS\Expose]
    #[JMS\Type("string")]
    #[JMS\SerializedName("name")]
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}