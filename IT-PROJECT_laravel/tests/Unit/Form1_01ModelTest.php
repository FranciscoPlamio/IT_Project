<?php

namespace Tests\Unit;

use App\Models\Forms\Form1_01;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class Form1_01ModelTest extends TestCase
{
    /**
     * Test Form1_01 model belongs to user relationship.
     */
    public function test_form1_01_belongs_to_user_relationship(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $form = Form1_01::create([
            'form_token' => 'test-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
        ]);

        $relatedUser = $form->user;

        $this->assertInstanceOf(User::class, $relatedUser);
        $this->assertEquals($user->_id, $relatedUser->_id);
    }

    /**
     * Test Form1_01 model includes extraFields in fillable.
     */
    public function test_form1_01_model_includes_extra_fields_in_fillable(): void
    {
        $form = new Form1_01();
        $fillable = $form->getFillable();

        // Base fields from BaseForm
        $this->assertContains('form_token', $fillable);
        $this->assertContains('user_id', $fillable);
        $this->assertContains('attachments', $fillable);

        // Extra fields from Form1_01
        $this->assertContains('last_name', $fillable);
        $this->assertContains('first_name', $fillable);
        $this->assertContains('middle_name', $fillable);
        $this->assertContains('dob', $fillable);
        $this->assertContains('email', $fillable);
    }

    /**
     * Test Form1_01 model date casts.
     */
    public function test_form1_01_model_has_correct_date_casts(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $form = Form1_01::create([
            'form_token' => 'test-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
            'dob' => '1990-01-01',
            'date_accomplished' => '2024-01-15',
            'admission_date' => '2024-02-01',
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $form->dob);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $form->date_accomplished);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $form->admission_date);
    }

    /**
     * Test Form1_01 model boolean cast for needs field.
     */
    public function test_form1_01_model_needs_is_casted_to_boolean(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $form = Form1_01::create([
            'form_token' => 'test-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
            'needs' => 1, // Test that it casts to boolean
        ]);

        $this->assertIsBool($form->needs);
        $this->assertTrue($form->needs);
    }

    /**
     * Test Form1_01 model float cast for or_amount field.
     */
    public function test_form1_01_model_or_amount_is_casted_to_float(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $form = Form1_01::create([
            'form_token' => 'test-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
            'or_amount' => '500.50', // Test that it casts to float
        ]);

        $this->assertIsFloat($form->or_amount);
        $this->assertEquals(500.50, $form->or_amount);
    }

    /**
     * Test Form1_01 model uses mongodb connection.
     */
    public function test_form1_01_uses_mongodb_connection(): void
    {
        $form = new Form1_01();
        $this->assertEquals('mongodb', $form->getConnectionName());
    }

    /**
     * Test Form1_01 model table name.
     */
    public function test_form1_01_has_correct_table_name(): void
    {
        $form = new Form1_01();
        $this->assertEquals('form1_01', $form->getTable());
    }
}
