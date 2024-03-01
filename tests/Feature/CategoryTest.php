<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testIndex()
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $category = Category::factory()->create();

        $response = $this->post('api/category', $category->toArray());

        $response->assertJsonFragment($category->toArray())
        ->assertStatus(201);

    }
}
