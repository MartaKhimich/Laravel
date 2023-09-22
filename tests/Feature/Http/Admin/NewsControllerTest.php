<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_News_List_Success(): void
    {
        //проверяем существование данного маршрута
        $response = $this->get(route('admin.news.index'));

        //проверяем существование данного текста на странице
        $response->assertSeeText('Список новостей');
        $response->assertStatus(200);
    }

    public function test_News_Store_Success(): void
    {
        $postData = [
            'title' => 'title',
            'description' => '111',
            'author' => 'Alex',
            'status' => 'draft',
        ];

        $response = $this->post(route('admin.news.store'), $postData);
        $response->assertStatus(419);
    }

    public function test_News_Create_Success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertSeeText('Добавить новость');
        $response->assertStatus(200);
    }

    public function test_Categories_List_Success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertSeeText('Список категорий');
        $response->assertStatus(200);
    }

    public function test_Categories_Create_Success(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertSeeText('Добавить категорию');
        $response->assertStatus(200);
    }
}
