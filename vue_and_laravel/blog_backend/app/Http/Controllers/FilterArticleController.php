<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\Category;
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

    public function main_articles()
    {
        return ArticleResource::collection(
            Article::orderBy('id', 'DESC')->limit(8)->get()
        );
    }

    public function whatnew()
    {
        $categories = CategoryResource::collection(Category::all());
        $articles = [];
        foreach ($categories as $category) {
            $article = ArticleResource::collection(
                Article::where('category_id', $category->id)
                    ->orderBy('id', 'DESC')
                    ->limit(6)
                    ->get()
            );
            array_push($articles,['category'=>$category->id, 'article'=>$article]);
            
        }
        return ['categories'=>$categories, 'articles'=>$articles];
    }
}
