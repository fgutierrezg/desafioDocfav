<?php
namespace App\Models;

class User {
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    //Agregué los metodos setter (y sus respsectivas validaciones) para nombre, email y password como se solicitaba.
    //Sin embargo, lo ideal hubiese sido modificar los usuarios solo en los casos de usos o repositorios para una mejor arquitectura del proyecto.

    public function setName(string $name): void {
        if (empty($name)) {
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El correo electrónico no es válido");
        }
        $this->email = $email;
    }
    
    public function setPassword(string $password): void {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("La contraseña debe tener al menos 8 caracteres");
        }
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    
}
