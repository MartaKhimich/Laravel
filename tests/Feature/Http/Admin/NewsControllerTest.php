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
}
