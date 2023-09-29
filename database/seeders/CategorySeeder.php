<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'title' => 'Политика',
                'description' => 'Новости политики',
                'created_at' => now(),
            ],
            [
                'title' => 'Спорт',
                'description' => 'Новости спорта',
                'created_at' => now(),
            ],
            [
                'title' => 'Санкт-Петербург',
                'description' => 'Новости Санкт-Петербурга',
                'created_at' => now(),
            ]
        ];
    }
}
