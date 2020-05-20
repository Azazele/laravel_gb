<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class lesson4 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function testNewsIds()
    {
        $ids = [1, 2, 3, 4, 5, 6, 7, 8];
        foreach ($ids as $id) {
            $response = $this->get('/news/' . $id);

            $response->assertStatus(200);
        }
    }

    public function testCats()
    {
        $response = $this->get('/news/cats');

        $response->assertStatus(200);
    }

    public function testCatsIds()
    {
        $ids = [1, 2, 3, 4];
        foreach ($ids as $id) {
            $response = $this->get('/news/cats/' . $id);
            $response->assertStatus(200);
        }

    }

    public function testFeedbackPage()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }

    public function testOrderPage()
    {
        $response = $this->get('/order');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

}
