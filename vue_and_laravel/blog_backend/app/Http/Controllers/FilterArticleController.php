<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controller;

class FilterArticleController extends Controller
{
    /**
     * Display a listing of the random articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function random_articles()
    {
        return ArticleResource::collection(
            Article::inRandomOrder()->limit(4)->get()
        );
    }

    /**
     * Display a listing of the articles by DESC.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_articles()
    {
        return ArticleResource::collection(
            Article::orderBy('id', 'DESC')->limit(8)->get()
        );
    }

    /**
     * Display a listing of the articles by all categories.
     *
     * @return \Illuminate\Http\Response
     */
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
        return [
            'categories' => $categories,
            'articles' => $articles,            
        ];
    }

    /**
     * Display a listing of the articles by category.
     *
     * @param  int  $id of category
     * @return \Illuminate\Http\Response
     */
    public function by_category($category_id)
    {
        return ArticleResource::collection(
            Article::where('category_id', $category_id)
                ->orderBy('id', 'DESC')
                ->paginate(5)
        );
    }

    /**
     * Display a listing of the article by author.
     *
     * @param  int  $id of user
     * @return \Illuminate\Http\Response
     */
    public function by_author($user_id)
    {
        return ArticleResource::collection(
            Article::where('category_id', $user_id)
                ->orderBy('id', 'DESC')
                ->paginate(5)
        );
    }

    /**
     * Display a listing of the article by title.
     *
     * @param  str  $title of article
     * @return \Illuminate\Http\Response
     */
    public function by_title($title)
    {
        return ArticleResource::collection(
            Article::where('title', 'LIKE', '%' . $title . '%')
                ->orderBy('id', 'DESC')
                ->paginate(5)
        );
    }
}
