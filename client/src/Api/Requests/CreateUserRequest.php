<?php


namespace App\Api\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CreateUserRequest
 * @package App\Api\Requests
 * @JMS\ExclusionPolicy("all")
 */
class CreateUserRequest extends AbstractRequest
{
    /**
     * @JMS\Expose
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @var string
     */
    protected string $name;

    /**
     * @JMS\Expose
     * @JMS\SerializedName("email")
     * @JMS\Type("string")
     * @var string
     */
    protected string $email;

    /**
     * @JMS\Expose
     * @JMS\SerializedName("name")
     * @JMS\Type("integer")
     * @var integer
     */
    protected int $group;

    public function getMethod(): string
    {
        return "POST";
    }

    public function getUri(): string
    {
        return "api/user";
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getGroup(): int
    {
        return $this->group;
    }

    /**
     * @param int $group
     */
    public function setGroup(int $group): void
    {
        $this->group = $group;
    }
}