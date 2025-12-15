<?php

namespace Tests\Unit;

use App\Models\Forms\FormsTransactions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FormsTransactionsModelTest extends TestCase
{
    /**
     * Test FormsTransactions model user relationship.
     */
    public function test_forms_transactions_belongs_to_user_relationship(): void
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

        $this->assertInstanceOf(User::class, $relatedUser);
        $this->assertEquals($user->_id, $relatedUser->_id);
    }

    /**
     * Test FormsTransactions model fillable attributes.
     */
    public function test_forms_transactions_model_has_correct_fillable_attributes(): void
    {
        $transaction = new FormsTransactions();
        $fillable = $transaction->getFillable();

        $this->assertContains('form_id', $fillable);
        $this->assertContains('form_token', $fillable);
        $this->assertContains('form_type', $fillable);
        $this->assertContains('user_id', $fillable);
        $this->assertContains('status', $fillable);
        $this->assertContains('payment_status', $fillable);
        $this->assertContains('payment_method', $fillable);
        $this->assertContains('payment_reference', $fillable);
        $this->assertContains('payment_amount', $fillable);
        $this->assertContains('payment_date', $fillable);
        $this->assertContains('remarks', $fillable);
    }

    /**
     * Test FormsTransactions model casts payment_date to date.
     */
    public function test_forms_transactions_payment_date_is_casted(): void
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
            'payment_date' => '2024-01-15',
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $transaction->payment_date);
    }

    /**
     * Test FormsTransactions model uses mongodb connection.
     */
    public function test_forms_transactions_uses_mongodb_connection(): void
    {
        $transaction = new FormsTransactions();
        $this->assertEquals('mongodb', $transaction->getConnectionName());
    }

    /**
     * Test FormsTransactions model table name.
     */
    public function test_forms_transactions_has_correct_table_name(): void
    {
        $transaction = new FormsTransactions();
        $this->assertEquals('forms_transactions', $transaction->getTable());
    }
}
