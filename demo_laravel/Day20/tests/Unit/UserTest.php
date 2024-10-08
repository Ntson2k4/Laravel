<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function test_example()
    {
        //b2
        // Tạo một người dùng không phải là admin
        $user = new User(['is_admin' => false]);
        $this->assertFalse($user->isAdmin());

        // Tạo một người dùng là admin
        // $adminUser = new User(['is_admin' => true]);
        // $this->assertTrue($adminUser->isAdmin());
    }
}
