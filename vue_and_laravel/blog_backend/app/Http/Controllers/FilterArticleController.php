<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CommentsResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comments;
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

            $articles[$category->id] = $article;
        }
        return ['categories' => $categories, 'articles' => $articles, 'info' => gettype($article->first())];
    }

    public function by_category($category_id)
    {
        return ArticleResource::collection(Article::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(5));
    }

    public function by_author($user_id)
    {
        return ArticleResource::collection(Article::where('category_id', $user_id)->orderBy('id', 'DESC')->paginate(5));
    }

    public function by_title($title)
    {
        return ArticleResource::collection(Article::where('title', 'LIKE', '%' . $title . '%')->orderBy('id', 'DESC')->paginate(5));
    }

    
}
