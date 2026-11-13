<?php

test('the homepage and flexy route render the dashboard', function () {
    foreach (['/', '/flexy'] as $path) {
        $response = $this->get($path);

        $response
            ->assertOk()
            ->assertSee('Sales overview')
            ->assertSee('id="sales-overview"', false);
    }
});

test('the users route renders inside the flexy layout', function () {
    $response = $this->get('/users');

    $response
        ->assertOk()
        ->assertSee('User directory')
        ->assertSee('saqib')
        ->assertSee('Dashboard');
});
