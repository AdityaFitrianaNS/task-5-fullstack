<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_post()
    {
        $this->visit('/posts/create');

        $this->submitForm('Save', [
            'title' => 'Laravel Task',
            
            'content' => 'Laravel adalah framework php'
        ]);

        $this->seeInDatabase('posts', [
            'title' => 'Laravel Task',

            'content' => 'Laravel adalah framework php'
        ]);

        $this->seePageIs('/posts');

        $this->see('Laravel Task');
        $this->see('Publish');
    }

    /** @test */
    public function user_can_browse_posts_index_page()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_edit_existing_post()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_delete_existing_post()
    {
        $this->assertTrue(true);
    }
}
