<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilterArticleController extends Controller
{
    public function random_articles()
    {
        return ArticleResource::collection(
            Article::inRandomOrder()->limit(4)->get()
        );
    }
}
