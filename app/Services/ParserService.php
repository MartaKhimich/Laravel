<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XmlParser::load($this->link);

        $data = $parser->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'news' => [
                'uses' => 'channel.item[title,author,description,pubDate,category,enclosure::url]'
            ],
        ]);

        //dd($data);

        foreach ($data['news'] as $news) {
            $category = Category::query()->firstOrCreate([
                'title' => $news['category'],
            ]);

            News::query()->firstOrCreate([
                    'category_id' => $category->id,
                    'title' => $news['title'],
                    'image' => $news['enclosure::url'],
                    'description' => $news['description'],
                    'author' => $news['author'],
                    'status' => 'active',
            ]);
        }

    }
}

