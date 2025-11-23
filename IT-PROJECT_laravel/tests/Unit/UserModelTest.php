<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Forms\FormsTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test User model hasFormTransaction method returns true when active transaction exists.
     */
    public function test_has_form_transaction_returns_true_when_active_transaction_exists(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
        ]);

        $this->assertTrue($user->hasFormTransaction());
    }

    /**
     * Test User model hasFormTransaction method returns false when no active transaction exists.
     */
    public function test_has_form_transaction_returns_false_when_no_active_transaction(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $this->assertFalse($user->hasFormTransaction());
    }

    /**
     * Test User model hasFormTransaction method ignores cancelled transactions.
     */
    public function test_has_form_transaction_ignores_cancelled_transactions(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'cancelled',
        ]);

        $this->assertFalse($user->hasFormTransaction());
    }

    /**
     * Test User model hasFormTransaction method ignores declined transactions.
     */
    public function test_has_form_transaction_ignores_declined_transactions(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'declined',
        ]);

        $this->assertFalse($user->hasFormTransaction());
    }

    /**
     * Test User model hasFormTransaction method ignores done transactions.
     */
    public function test_has_form_transaction_ignores_done_transactions(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'done',
        ]);

        $this->assertFalse($user->hasFormTransaction());
    }

    /**
     * Test User model fillable attributes.
     */
    public function test_user_model_has_correct_fillable_attributes(): void
    {
        $user = new User();
        $fillable = $user->getFillable();

        $this->assertContains('name', $fillable);
        $this->assertContains('email', $fillable);
        $this->assertContains('password', $fillable);
    }

    /**
     * Test User model hidden attributes.
     */
    public function test_user_model_has_correct_hidden_attributes(): void
    {
        $user = new User();
        $hidden = $user->getHidden();

        $this->assertContains('password', $hidden);
        $this->assertContains('remember_token', $hidden);
    }
}
