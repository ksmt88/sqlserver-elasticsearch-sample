<?php


namespace App\Domain\Repository;


use App\Domain\Model\Users;

interface UserRepository
{
    public function Find(string $matchText): Users;
}
