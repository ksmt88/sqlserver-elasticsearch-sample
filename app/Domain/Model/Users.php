<?php


namespace App\Domain\Model;


class Users
{
    /** @var User[] */
    private array $users = [];

    private function __construct()
    {
    }

    public static function create(): Users
    {
        return new self();
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }
}
