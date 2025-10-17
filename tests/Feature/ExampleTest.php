<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the application returns a 404 for a non-existent page', function () {
    $response = $this->get('/non-existent-page');

    $response->assertStatus(404);
});
