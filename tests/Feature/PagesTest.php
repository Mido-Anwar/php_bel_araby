<?php

/**
 * Static Pages Tests
 */

test('home page loads successfully', function () {
    $this->get('/')->assertStatus(200);
});

test('about page loads successfully', function () {
    $this->get('/about')->assertStatus(200);
});

test('privacy page loads successfully', function () {
    $this->get('/privacy')->assertStatus(200);
});

test('terms page loads successfully', function () {
    $this->get('/terms')->assertStatus(200);
});

test('contact page loads successfully', function () {
    $this->get('/contact')->assertStatus(200);
});

test('blog page loads successfully', function () {
    $this->get('/blog')->assertStatus(200);
});

test('about page mentions Whiscrashow', function () {
    $this->get('/about')
        ->assertSee('Whiscrashow');
});

test('privacy page mentions cookies', function () {
    $this->get('/privacy')
        ->assertSee('Cookies');
});

test('terms page mentions intellectual property', function () {
    $this->get('/terms')
        ->assertSee('الملكية الفكرية');
});

test('contact form can be submitted', function () {
    $data = [
        'name'    => 'أحمد',
        'email'   => 'test@example.com',
        'subject' => 'استفسار',
        'message' => 'هذا نص تجريبي للرسالة للاختبار.',
    ];

    $response = $this->post('/contact', $data);

    $response->assertRedirect();
    $response->assertSessionHas('success');
});

test('contact form requires name', function () {
    $this->post('/contact', [
        'email'   => 'test@example.com',
        'subject' => 'Test',
        'message' => 'This is a test message body.',
    ])->assertSessionHasErrors('name');
});

test('contact form requires valid email', function () {
    $this->post('/contact', [
        'name'    => 'Ahmed',
        'email'   => 'invalid-email',
        'subject' => 'Test',
        'message' => 'This is a test message body.',
    ])->assertSessionHasErrors('email');
});

test('contact form requires message', function () {
    $this->post('/contact', [
        'name'    => 'Ahmed',
        'email'   => 'test@example.com',
        'subject' => 'Test',
    ])->assertSessionHasErrors('message');
});
