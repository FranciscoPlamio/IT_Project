<?php

namespace Tests\Feature;

use App\Models\Forms\Form1_01;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class Form1_01MongoTest extends TestCase
{
    /**
     * Test creating a Form1_01 document in MongoDB.
     */
    public function test_can_create_form1_01_document(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $formData = [
            'form_token' => 'test-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
            'middle_name' => 'Middle',
            'dob' => '1990-01-01',
            'sex' => 'Male',
            'nationality' => 'Filipino',
            'email' => 'john@example.com',
            'contact_number' => '09123456789',
        ];

        $form = Form1_01::create($formData);

        $this->assertNotNull($form->_id);
        $this->assertEquals('test-token-123', $form->form_token);
        $this->assertEquals('Doe', $form->last_name);
        $this->assertEquals('John', $form->first_name);
    }

    /**
     * Test Form1_01 date casting for dob field.
     */
    public function test_form1_01_dob_is_casted_to_date(): void
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
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $form->dob);
    }

    /**
     * Test Form1_01 boolean casting for needs field.
     */
    public function test_form1_01_needs_is_casted_to_boolean(): void
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
            'needs' => true,
        ]);

        $this->assertIsBool($form->needs);
        $this->assertTrue($form->needs);
    }

    /**
     * Test Form1_01 float casting for or_amount field.
     */
    public function test_form1_01_or_amount_is_casted_to_float(): void
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
            'or_amount' => 500.50,
        ]);

        $this->assertIsFloat($form->or_amount);
        $this->assertEquals(500.50, $form->or_amount);
    }

    /**
     * Test Form1_01 belongs to user relationship.
     */
    public function test_form1_01_belongs_to_user(): void
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

        $this->assertNotNull($relatedUser);
        $this->assertEquals($user->_id, $relatedUser->_id);
        $this->assertEquals('John Doe', $relatedUser->name);
    }

    /**
     * Test updating Form1_01 document.
     */
    public function test_can_update_form1_01_document(): void
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
            'email' => 'old@example.com',
        ]);

        $form->update([
            'email' => 'new@example.com',
            'contact_number' => '09987654321',
        ]);

        $updatedForm = Form1_01::find($form->_id);

        $this->assertEquals('new@example.com', $updatedForm->email);
        $this->assertEquals('09987654321', $updatedForm->contact_number);
    }

    /**
     * Test finding Form1_01 by form_token.
     */
    public function test_can_find_form1_01_by_form_token(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        Form1_01::create([
            'form_token' => 'unique-token-123',
            'user_id' => $user->_id,
            'last_name' => 'Doe',
            'first_name' => 'John',
        ]);

        $form = Form1_01::where('form_token', 'unique-token-123')->first();

        $this->assertNotNull($form);
        $this->assertEquals('unique-token-123', $form->form_token);
    }

    /**
     * Test deleting Form1_01 document.
     */
    public function test_can_delete_form1_01_document(): void
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

        $formId = $form->_id;
        $form->delete();

        $deletedForm = Form1_01::find($formId);
        $this->assertNull($deletedForm);
    }
}
