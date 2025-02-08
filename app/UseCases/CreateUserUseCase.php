<?php
namespace App\UseCases;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class CreateUserUseCase {
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, string $email, string $password): User {
        $user = new User($name, $email, $password);
        $this->userRepository->save($user);
        return $user;
    }
}
