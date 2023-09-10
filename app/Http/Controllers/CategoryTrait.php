<?php

declare(strict_types=1);

namespace App\Http\Controllers;


trait CategoryTrait
{
    public function getCategories(int $id = null): array
    {
        $data = [];
        $quantityCategories = 5;

        if ($id === null) {
            for($i=1; $i <= $quantityCategories; $i++){
                $data[$i] = [
                    'category_id' => $i,
                    'news_1' => \fake()->text(100),
                    'news_2' => \fake()->text(100),
                    'news_3' => \fake()->text(100),
                    'news_4' => \fake()->text(100),
                ];
            }
            return $data;
        }

        return [
            'category_id' => $id,
            'news_1' => \fake()->text(100),
            'news_2' => \fake()->text(100),
            'news_3' => \fake()->text(100),
            'news_4' => \fake()->text(100),
        ];
    }
}


