<?php


namespace App\Domain\Model;


class User
{
    private int    $id;
    private string $name;
    private string $email;
    private string $createdAt;
    private string $updatedAt;

    private function __construct()
    {
    }

    public static function reconstructFromRepository(
        int $id,
        string $name,
        string $email,
        string $createdAt,
        string $updatedAt
    ): User
    {
        $user            = new self();
        $user->id        = $id;
        $user->name      = $name;
        $user->email     = $email;
        $user->createdAt = $createdAt;
        $user->updatedAt = $updatedAt;

        return $user;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
}
