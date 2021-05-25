<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
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

        $this->post('/api/auth/register', [
            'name' => 'Mago',
            'email' => 'mago@mail.com',
            'address' => 'perill 255',
            'cif_nif' => '44963200V',
            'image' => 'http//:imageprueva.com',
            'password' => 'iloveswing',
        ]);

        $this->assertCredentials([
            'name' => 'Mago',
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);

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

        $this->get('/api/auth/logout', [
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);

        $this->assertCredentials([
            'email' => 'mago@mail.com',
            'password' => 'iloveswing',
        ]);

    }
}
