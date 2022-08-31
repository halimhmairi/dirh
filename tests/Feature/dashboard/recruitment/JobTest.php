<?php

namespace Tests\Feature\dashboard\recruitment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Job;
use App\Models\User;
class JobTest extends TestCase
{
    /**
     * A basic feature test job.
     *
     * @return void
     */
    public function test_create_user_add_job_checkIt_in_list()
    {  
        $user = User::factory(1)->create();
        
        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        //Given we have job in the database
        $job = Job::factory(1)->create(); 

        //When user visit the job page
        $response = $this->actingAs($user->first())->get('/jobs');

        //He should be able to read the task
        $response->assertSee($job->first()->title);
    }

    public function test_login_user_update_job_checkIt_in_list()
    {   
        // not completed
        $user = User::latest()->first();
  
        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $job = Job::latest()->first();

        //When user visit the job page
      //  $response = $this->actingAs($user->first())->get('/jobs');

        //He should be able to read the task
       // $response->assertSee($job->first()->title);
    }
}
