<?php


namespace App\Service;


use App\Domain\Repository\UserRepository;

class GetUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(string $word): array
    {
        $users = $this->userRepository->Find($word)->getUsers();

        $usersDto = [];
        foreach ($users as $user) {
            $usersDto[] = [
                'id'         => $user->getId(),
                'name'       => $user->getName(),
                'email'      => $user->getEmail(),
                'created_at' => $user->getCreatedAt(),
                'updated_at' => $user->getUpdatedAt(),
            ];
        }

        return $usersDto;
    }
}
