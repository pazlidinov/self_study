<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleResource::collection(Article::orderBy('id', 'DESC')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('article-img', $name);
        }

        $new_article = Article::create([
            'title' => $request->title,
            'img' => $path ?? null,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);

        return ['status' => 200, 'article' => $new_article->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = new ArticleResource($article);
        $like_article = ArticleResource::collection(
            Article::inRandomOrder()->limit(2)->get()
        );
        return [
            'article' => $article,
            'like_articles' => $like_article
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
 
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('article-img', $name);
        }
        $article->update([
            'title' => $request->title,
            'img' => $path ?? $article->img,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);

        return ['The article was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return ['The article was successfully deleted'];
    }
}
