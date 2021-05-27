<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User;

class Usertest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    function user_can_be_created()
    {
        $this->withoutExceptionHandling();
        User::truncate();

        $this->assertEquals(0, User::count());

        $this->post('/api/auth/register', [
            'name' => 'Mago',
            'email' => 'mago@mail.com',
            'address' => 'perill 255',
            'cif_nif' => '44963200V',
            'image' => 'http//:imageprueva.com',
            'password' => 'iloveswing',
        ]);

        $this->assertEquals(1, User::count());

        $user = User::first();
        $this->assertEquals('Mago', $user->name);
        $this->assertEquals('mago@mail.com', $user->email);
        $this->assertEquals('44963200V', $user->cif_nif);

    }

    /** @test */
    function user_can_be_authenticated()
    {
        $this->withoutExceptionHandling();

        $this->post('/api/auth/login', [
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);

        $this->assertCredentials([
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);

    }

    /** @test */
    function user_can_log_out()
    {
        $this->withoutExceptionHandling();

        $token = Str::random(20);

        $response = $this->withHeaders([
            'Bearer' => $token,
        ])->get('/api/auth/logout', [
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);


        $response->assertStatus(200);

    }
}
