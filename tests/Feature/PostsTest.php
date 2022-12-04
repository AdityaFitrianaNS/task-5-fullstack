<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithFaker;

    protected $user;
    protected $categories;

     /** @test */
    public function test_user_can_browse_posts_index_page()
    {
        $postOne = Post::create([
            'id' => 15,
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'Belajar Laravel 8 at qadrLabs edisi 1',
            'content' => 'ini adalah tutorial belajar laravel 8 edisi 1',
            'image' => 'sadasdas',
            'user_id' => 1
        ]);

        $postTwo = Post::create([
            'title' => 'Belajar Laravel 8 at qadrLabs edisi 2',
            'category_id' => 4,
            'image' => 'sadasdas',
            'content' => 'ini adalah tutorial belajar laravel 8 edisi 2',
            'user_id' => 1
        ]);

        // user membuka halaman daftar post
        $this->visit('/posts');

        // user melihat dua title dari data post
        $this->see('Belajar Laravel 8 at qadrLabs edisi 1');
        $this->see('Belajar Laravel 8 at qadrLabs edisi 2');
    }
}
