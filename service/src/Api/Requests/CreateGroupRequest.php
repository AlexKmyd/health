<?php


namespace App\Api\Requests;

use Symfony\Component\Validator\Constraints as Assert;

class CreateGroupRequest extends AbstractRequest
{
    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[Assert\NotNull]
    protected $name;

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
}