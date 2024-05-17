```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactUsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contact_page_loads()
    {
        $response = $this->get(route('contact-us'));

        $response->assertStatus(200);
    }

    /**
     * Test if contact form submission is successful
     */
    public function test_contact_form_submission()
    {
        $response = $this->post(route('spc.contact'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123-456-7890',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ]);

        $response->assertStatus(200)
            ->assertSee('Message sent successfully!');
    }

    /**
     * Test email validation
     */
    public function test_email_validation()
    {
        $response = $this->post(route('spc.contact'), [
            'name' => 'John Doe',
            'email' => 'invalidemail',
            'phone' => '123-456-7890',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ]);

        $response->assertStatus(422)
            ->assertSee('Invalid email format. Please enter a valid email address.');
    }

    /**
     * Test phone number validation
     */
    public function test_phone_validation()
    {
        $response = $this->post(route('spc.contact'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ]);

        $response->assertStatus(422)
            ->assertSee('Invalid phone number format. Please use XXX-XXX-XXXX.');
    }
}

```
This test class includes test methods for checking if the contact page loads successfully, if the contact form submission is successful, and if the email and phone number validations work as expected. You can adjust the route names and input data according to your application's setup.