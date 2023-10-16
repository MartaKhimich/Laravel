<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Services\Interfaces\Parser;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {
        $urls = Resource::all();

        foreach($urls as $url) {
            dispatch(new NewsParsingJob($url->url));
        }

        return redirect(route('news'));
    }
}
