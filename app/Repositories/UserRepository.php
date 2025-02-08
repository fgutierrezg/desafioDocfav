<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    private array $users = [];

    public function save(User $user): void {
        $this->users[$user->getEmail()] = $user;
    }

    public function findByEmail(string $email): ?User {
        return $this->users[$email] ?? null;
    }

    public function deleteByEmail(string $email): void {
        if (isset($this->users[$email])) {
            unset($this->users[$email]);
        }
    }
}
