<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserMongoTest extends TestCase
{
    /**
     * Test creating a user in MongoDB.
     */
    public function test_can_create_user_in_mongodb(): void
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ];

        $user = User::create($userData);

        $this->assertNotNull($user->_id);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /**
     * Test finding a user by ID in MongoDB.
     */
    public function test_can_find_user_by_id(): void
    {
        $user = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);

        $foundUser = User::find($user->_id);

        $this->assertNotNull($foundUser);
        $this->assertEquals($user->_id, $foundUser->_id);
        $this->assertEquals('Jane Doe', $foundUser->name);
    }

    /**
     * Test updating a user in MongoDB.
     */
    public function test_can_update_user_in_mongodb(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user->update([
            'name' => 'John Updated',
            'email' => 'johnupdated@example.com',
        ]);

        $updatedUser = User::find($user->_id);

        $this->assertEquals('John Updated', $updatedUser->name);
        $this->assertEquals('johnupdated@example.com', $updatedUser->email);
    }

    /**
     * Test deleting a user from MongoDB.
     */
    public function test_can_delete_user_from_mongodb(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $userId = $user->_id;
        $user->delete();

        $deletedUser = User::find($userId);
        $this->assertNull($deletedUser);
    }

    /**
     * Test finding user by email in MongoDB.
     */
    public function test_can_find_user_by_email(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user = User::where('email', 'john@example.com')->first();

        $this->assertNotNull($user);
        $this->assertEquals('john@example.com', $user->email);
    }

    /**
     * Test user password is hashed automatically.
     */
    public function test_user_password_is_hashed(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'plainpassword',
        ]);

        $this->assertNotEquals('plainpassword', $user->password);
        $this->assertTrue(Hash::check('plainpassword', $user->password));
    }

    /**
     * Test user email verification cast.
     */
    public function test_user_email_verified_at_is_casted_to_datetime(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $user->email_verified_at);
    }
}
