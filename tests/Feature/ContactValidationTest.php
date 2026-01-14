<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = \App\Models\User::factory()->create();
    }

    /** @test */
    public function name_is_required()
    {

        $response = $this->actingAs($this->user)->post('/contacts', [
            'name' => '',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_must_be_at_least_5_characters()
    {
        $response = $this->actingAs($this->user)->post('/contacts', [
            'name' => 'Test',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function contact_must_be_9_digits()
    {
        $response = $this->actingAs($this->user)->post('/contacts', [
            'name' => 'Test Name',
            'contact' => '12345',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors('contact');
    }

    /** @test */
    public function email_must_be_valid()
    {
        $response = $this->actingAs($this->user)->post('/contacts', [
            'name' => 'Test Name',
            'contact' => '123456789',
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function email_must_be_unique()
    {
        Contact::create([
            'name' => 'Existing Contact',
            'contact' => '111111111',
            'email' => 'existing@example.com',
        ]);

        $response = $this->actingAs($this->user)->post('/contacts', [
            'name' => 'New Contact',
            'contact' => '222222222',
            'email' => 'existing@example.com',
        ]);

        $response->assertSessionHasErrors('email');
    }
}