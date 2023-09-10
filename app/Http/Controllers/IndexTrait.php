<?php

declare(strict_types=1);

namespace App\Http\Controllers;


trait IndexTrait
{
    public function getInfo(): array
    {
        return [
            'title' => 'Information',
            'description' => \fake()->text(1000),
            'created_at' => \now()->format('d-m-Y H:i'),
        ];
    }

}
