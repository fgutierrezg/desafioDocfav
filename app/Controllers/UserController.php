<?php
namespace App\Controllers;

use App\UseCases\CreateUserUseCase;
use App\Repositories\UserRepository;

class UserController {
    private CreateUserUseCase $createUserUseCase;

    public function __construct() {
        $userRepository = new UserRepository();
        $this->createUserUseCase = new CreateUserUseCase($userRepository);
    }

    public function store(): void {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            echo "Todos los campos son obligatorios.";
            return;
        }

        $user = $this->createUserUseCase->execute($name, $email, $password);
        echo "Usuario {$user->getName()} registrado con éxito.";
    }
}
