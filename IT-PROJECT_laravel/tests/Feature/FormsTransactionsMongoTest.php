<?php

namespace Tests\Feature;

use App\Models\Forms\FormsTransactions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FormsTransactionsMongoTest extends TestCase
{
    /**
     * Test creating a form transaction in MongoDB.
     */
    public function test_can_create_form_transaction(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $transaction = FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        $this->assertNotNull($transaction->_id);
        $this->assertEquals('test-token-123', $transaction->form_token);
        $this->assertEquals('1-01', $transaction->form_type);
        $this->assertEquals('pending', $transaction->status);
    }

    /**
     * Test form transaction belongs to user relationship.
     */
    public function test_form_transaction_belongs_to_user(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $transaction = FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
        ]);

        $relatedUser = $transaction->user;

        $this->assertNotNull($relatedUser);
        $this->assertEquals($user->_id, $relatedUser->_id);
        $this->assertEquals('John Doe', $relatedUser->name);
    }

    /**
     * Test updating form transaction status.
     */
    public function test_can_update_form_transaction_status(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $transaction = FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
        ]);

        $transaction->update([
            'status' => 'approved',
            'payment_status' => 'paid',
            'payment_amount' => 500.00,
        ]);

        $updatedTransaction = FormsTransactions::find($transaction->_id);

        $this->assertEquals('approved', $updatedTransaction->status);
        $this->assertEquals('paid', $updatedTransaction->payment_status);
        $this->assertEquals(500.00, $updatedTransaction->payment_amount);
    }

    /**
     * Test form transaction payment_date cast.
     */
    public function test_form_transaction_payment_date_is_casted_to_date(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $transaction = FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
            'payment_date' => now(),
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $transaction->payment_date);
    }

    /**
     * Test finding transactions by status.
     */
    public function test_can_find_transactions_by_status(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-1',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
        ]);

        FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439012',
            'form_token' => 'test-token-2',
            'form_type' => '1-02',
            'user_id' => $user->_id,
            'status' => 'approved',
        ]);

        $pendingTransactions = FormsTransactions::where('status', 'pending')->get();

        $this->assertCount(1, $pendingTransactions);
        $this->assertEquals('pending', $pendingTransactions->first()->status);
    }

    /**
     * Test deleting a form transaction.
     */
    public function test_can_delete_form_transaction(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $transaction = FormsTransactions::create([
            'form_id' => '507f1f77bcf86cd799439011',
            'form_token' => 'test-token-123',
            'form_type' => '1-01',
            'user_id' => $user->_id,
            'status' => 'pending',
        ]);

        $transactionId = $transaction->_id;
        $transaction->delete();

        $deletedTransaction = FormsTransactions::find($transactionId);
        $this->assertNull($deletedTransaction);
    }
}
