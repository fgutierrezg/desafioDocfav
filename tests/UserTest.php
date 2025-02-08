<?php
use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase {
    public function testCreateUser() {
        $user = new User("Juan", "juan@example.com", "secreta123");
        $this->assertEquals("Juan", $user->getName());
        $this->assertEquals("juan@example.com", $user->getEmail());
        $this->assertTrue($user->verifyPassword("secreta123"));
    }
}
