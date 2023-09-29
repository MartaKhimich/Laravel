<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityNews = 20;
        $status = ['draft', 'active', 'blocked'];
        $news = [];
        for ($i=0; $i < $quantityNews; $i++) {
            $news[] = [
                'category_id' => fake()->numberBetween(1,3),
                'title' => fake()->jobTitle(),
                'image'  => fake()->imageUrl(200, 150),
                'description' => fake()->text(100) ,
                'author' => fake()->userName(),
                'status' => fake()->randomElement($status),
                'created_at' => now(),
            ];
        }

        return $news;
    }
}
