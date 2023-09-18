<?php

declare(strict_types=1);

namespace App\Http\Controllers;


trait CategoryTrait
{
    public function getCategories(int $id = null): array
    {
        $data = [];
        $quantityCategories = 6;

        if ($id === null) {
            for($i=1; $i <= $quantityCategories; $i++){
                $data[$i] = [
                    'category_id' => $i,
                    'news' => \fake()->text(100),
                ];
            }
            return $data;
        }

        return [
            'category_id' => $id,
            'news' => \fake()->text(100),
        ];
    }
}


