<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_requires_name_email_and_message()
    {
        $this->postJson('/api/submit', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }

     /** @test */
     public function it_dispatches_a_job_on_valid_submission()
     {
         $this->expectsJobs(\App\Jobs\ProcessSubmission::class);
 
         $this->postJson('/api/submit', [
             'name' => 'John Doe',
             'email' => 'john.doe@example.com',
             'message' => 'This is a test message.',
         ])->assertStatus(200);
     }
}
