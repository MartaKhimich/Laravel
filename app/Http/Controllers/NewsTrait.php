<?php

declare(strict_types=1);

namespace App\Http\Controllers;

//По сути NewsTrait - модель в схеме MVC
trait NewsTrait
{
    //метод принимает на вход id, но этот идентификатор м/б null
    public function getNews(int $id = null): array //возврат массива
    {
        $news = [];
        $quantityNews = 10;

        if ($id === null) {
            for($i=1; $i < $quantityNews; $i++){
                $news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),//хелпер - функция доступная по всему проекту
                    'image' => \fake()->imageUrl(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'status' => 'ACTIVE',
                    'created_at' => \now()->format('d-m-Y H:i'),
                ];
            }
            return $news;
        }
        return [
            'id' => $id,
            'title' => \fake()->jobTitle(),
            'image' => \fake()->imageUrl(),
            'description' => \fake()->text(1000),
            'author' => \fake()->userName(),
            'status' => 'ACTIVE',
            'created_at' => \now()->format('d-m-Y H:i'),
        ];
    }
}
