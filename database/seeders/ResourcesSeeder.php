<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert($this->getResources());
    }

    public function getResources()
    {
        return
            [
                [
                    'url' => "https://news.rambler.ru/rss/tech",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/community",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/world",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/moscow_city",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/politics",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/incidents",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/starlife",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/army",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/games",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/articles",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/Omsk",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/Khanty",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/Saransk",
                ],
            ];
    }
}
