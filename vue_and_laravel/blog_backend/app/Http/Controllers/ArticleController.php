<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\ReplayCommentsResource;
use App\Models\Article;
use App\Models\Comments;
use App\Models\ReplayComments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *     path="/api/article",
     *     summary="Get a list of articles",
     *     tags={"article"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return ArticleResource::collection(
            Article::orderBy('id', 'DESC')->paginate(5)
        );
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

    /**
     * @OA\Post(
     *     path="/api/article/",
     *     summary="Store a newl article created resource in storage.",
     *      tags={"article"},
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="article's title",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="body",
     *         in="query",
     *         description="article's body",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="article's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         description="article's category_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="article's imgs",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The article was successfully created"),
     *   
     * )
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

    /**
     * @OA\Get(
     *     path="/api/article/id",
     *     summary="Display the details of article.",
     *     tags={"article"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Article $article)
    {
        $article->view++;
        $article->save();

        $like_article = ArticleResource::collection(
            Article::inRandomOrder()->limit(2)->get()
        );
        $comments = CommentsResource::collection(
            Comments::where('article_id', $article->id)->get()
        );

        $replay_comments = [];
        foreach ($comments as $comment) {
            $replay_comments[$comment->id] = ReplayCommentsResource::collection(
                ReplayComments::where('comments_id', $comment->id)->get()
            );
        }
        return [
            'article' => new ArticleResource($article),
            'like_articles' => $like_article,
            'comments' => $comments,
            'replay_comments' => $replay_comments,
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

    /**
     * @OA\Put(
     *     path="/api/article/id",
     *     summary="Update the  article in storage.",
     *     tags={"article"},
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="article's title",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="body",
     *         in="query",
     *         description="article's body",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="article's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         description="article's category_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="article's imgs",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The article was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
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
            'img' =>  $path ?? null,
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
    /**
     * @OA\Delete(
     *     path="/api/article/id",
     *     summary="Remove the article from storage.",
     *     tags={"article"},
     *     @OA\Response(response=200, description="The article was successfully deleted"),
     *     
     * )
     */
    public function destroy(Article $article)
    {
        if (File::exists($article->img)) {
            File::delete($article->img);
        };
        $article->delete();
        return ['The article was successfully deleted'];
    }
}
