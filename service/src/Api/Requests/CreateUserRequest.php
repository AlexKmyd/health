<?php


namespace App\Api\Requests;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateUserRequest
 * @package App\Api\Api\Requests
 */
class CreateUserRequest extends AbstractRequest
{
    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[Assert\NotNull]
    protected $name;


    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[Assert\NotNull]
    #[Assert\Email]
    protected $email;

    /**
     * @var int|null
     */
    protected $group;

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
     * @return int|null
     */
    public function getGroup(): ?int
    {
        return (int)$this->group;
    }

    /**
     * @param int|null $group
     */
    public function setGroup(?int $group): void
    {
        $this->group = $group;
    }
}