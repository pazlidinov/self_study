<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::orderBy('id', 'DESC')->limit(5)->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display a listing of random articles.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function random_articles()
    {
        $articles = Article::inRandomOrder()->limit(12)->get();
        $article_category_id = [];
        foreach ($articles as $item) {
            array_push($article_category_id, $item['category_id']);
        };
        $cat = Category::whereIn('id', $article_category_id)->get();
        foreach ($articles as $article_item) {
            foreach ($cat as $cat_item) {
                if ($article_item['category_id'] == $cat_item['id']) {
                    $article_item['category'] = $cat_item['name'];
                }
            }
        };
        return $articles;

        // $cat = Category::where('id', 6)->first();
        // Article::create(
        //     [
        //         'title' => 'article-6',
        //         'photo' => 'C:\Users\XTreme.ws\Desktop\blog_photo\img-3.jpg',
        //         'body' => 'irvnionvonv  rv wowov wwoif wo fw fwf wf wf iowr fiow foiwf oiw oiw oiw fowrim fwoi fowi fw frfoiwfiwf iowfoin foiwfiwr oir ow owoiw oiw oiw oiw fiw fowi fwrjiwrj wirffjifw fwf owjfwwj wojwj wr jw wj w w pw  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident molestiae, quasi officia ipsam nostrum quo totam dolores unde fugiat error molestias vero vel sed! Minima non cumque nesciunt nemo itaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, obcaecati voluptate minima ullam nihil tenetur natus eaque temporibus iusto dolorum possimus quasi aliquid harum error! Eum odio vel nulla recusandae!',
        //         'user_id' => '1',
        //         'category_id' => $cat->id,
        //     ]
        // );
        // return 'ok';
    }

    /**
     * Display a listing of articles by category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article_by_category($id)
    {
        return Article::where('category_id', $id)->limit(6)->get();       
    }
}
