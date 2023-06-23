<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Testing\WithoutMiddleware;

it('redirects to the login page if not logged in', function () {
    //when
    $response = $this->get('/');

    //then
    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

it('redirects to the dashboard page when logged in', function () {
    //given
    $email = 'admin@mbdash.com';
    $password = '#KeEpItSeCr3t';
    $hashedPassword = Hash::make($password);
    User::create([
        'email' => $email,
        'password' => $hashedPassword,
    ]);

    //when
    $response = $this->post('/login', [
        'email' => $email,
        'password' => $password,
    ]);

    //then
    $response->assertSessionMissing('errors');
    $response->assertSessionHasNoErrors();
    $response->assertStatus(302);
    $response->assertRedirect('/dashboard');
});
