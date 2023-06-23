<?php

it('redirects to the login page if not logged in', function () {
    //when
    $response = $this->get('/');

    //then
    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

it('redirects to the dashboard page when logged in', function () {
    //given
    $response = $this->post('/login', [
        '_token' => '9hy6VFCnf5TDIYJ28yDrUEDBOoUduLFCct1ZtuKY',
        'email' => 'admin@mbdash.com',
        'password' => "#KeEpItSeCr3t",
    ]);

    //when
    $responseRoot = $this->get('/');

    //then
    $response->assertSessionMissing('errors');
    $response->assertSessionHasNoErrors();
    $responseRoot->assertStatus(302);
    //...
    $responseRoot->assertRedirect('/dashboard');
});
