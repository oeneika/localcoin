<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegistration()
    {
        $response = $this->json('POST', '/register', [
            'name'  =>$this->faker->firstName ,
            'lastname'  =>$this->faker->lastName ,
            'country'   =>$this->faker->country ,
            'address'   =>$this->faker->address ,
            'city'  =>$this->faker->city ,
            'state'     =>$this->faker->state ,
            'email'     =>$this->faker->email ,
            'user'  =>$this->faker->userName ,
            'password'  =>$this->faker->password 
            ]);
        $response->assertStatus(200);
    }
}
