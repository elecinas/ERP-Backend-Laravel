<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User;

class ClienTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    function client_can_be_created()
    {

        $this->withoutExceptionHandling();

        $token = Str::random(20);
        User::truncate();

        $this->assertEquals(0, User::count());

        $response = $this->withHeaders([
            'Bearer' => $token,
        ])->post('/api/auth/register', [
            'name' => 'Mago',
            'email' => 'mago@mail.com',
            'address' => 'perill 255',
            'cif_nif' => '44963200V',
            'image' => 'http//:imageprueva.com',
            'password' => 'iloveswing',
        ]);

        $response->assertStatus(201);

        $this->assertEquals(1, User::count());

        $client = User::first();
        $this->assertEquals('Mago', $client->name);
        $this->assertEquals('mago@mail.com', $client->email);
        $this->assertEquals('44963200V', $client->cif_nif);
    }

    /** @test */
    public function clients_can_be_listed()
    {

        $this->withoutExceptionHandling();

        $token = Str::random(20);

        $response =$this->withHeaders([
            'Bearer' => $token,
        ])->get('/api/users/clients');

        $response->assertStatus(200);
    }

    /** @test */
    public function client_can_be_shown()
    {

        $this->withoutExceptionHandling();

        $token = Str::random(20);

        $client = User::first();

        $response =$this->withHeaders([
            'Bearer' => $token,
        ])->get('/api/users/clients/'.$client->id);

        $response->assertStatus(200);
    }

    /** @test */
    public function client_can_be_updated()
    {

        $this->withoutExceptionHandling();

        $token = Str::random(20);

        $client = User::first();

        $response =$this->withHeaders([
            'Bearer' => $token,
        ])->put('/api/users/clients/'.$client->id, [
            'name' => 'Mago',
            'email' => 'mago@mail.com',
            'address' => 'perill 255',
            'cif_nif' => '44963200V',
            'image' => 'http//:imageprueva.com',
            'password' => 'iloveswing',
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function client_can_be_deleted()
    {

        $this->withoutExceptionHandling();

        $token = Str::random(20);

        $client = User::first();

        $response =$this->withHeaders([
            'Bearer' => $token,
        ])->delete('/api/users/clients/'.$client->id);

        $response->assertStatus(200);
    }
}
