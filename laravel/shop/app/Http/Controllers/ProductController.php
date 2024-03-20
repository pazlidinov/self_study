<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Filter  list id of product from session.
     * 
     * @param  string $val
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filter_session($request, $val)
    {
        $answer_array = [];
        foreach ($request->session()->all() as $key => $value) {
            array_push(
                $answer_array,
                substr(strval($key), 0, 4) == $val ? $value : ''
            );
        }

        return $answer_array;
    }

    /**
     * Display  categories for all pages.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $category = Category::all();

        // Sharing is caring
        view()->share('category', $category);
    }

    /**
     * Display  the news and information about shop.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_page()
    {
        $products = Product::orderBy('id', 'DESC')->take(8)->get();

        return view(
            'home_page',
            ['products' => $products]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(9);

        return view(
            'index',
            ['products' => $products]
        );
    }

    /**
     * Display a listing of the resource by category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function by_category($id)
    {
        $products = Product::orderBy('id', 'DESC')
            ->where('category_id', $id)
            ->paginate(9);

        return view(
            'index',
            ['products' => $products]
        );
    }

    /**
     * Display a listing of the filter by category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter_by_category(Request $request)
    {
        if (in_array("0", $request->all())) {
            $products = Product::orderBy('id', 'DESC')->get();
        } else {
            $products = Product::orderBy('id', 'DESC')
                ->whereIn('category_id', $request)
                ->paginate(9);
        };

        return view(
            'index',
            ['products' => $products]
        );
    }

    /**
     * Display a listing of the filter by name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter_by_name(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->paginate(9);

        return view(
            'index',
            ['products' => $products]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->with('comments', 'images')
            ->first();
        if ($id != $request->session()->get('view' . $id)) {
            $request->session()->put('view' . $id, $id);
            $product->view++;
            $product->save();
        }
        $like_products = Product::inRandomOrder()->limit(5)->get();

        return view(
            'show',
            [
                'product' => $product,
                'like_products' => $like_products
            ]
        );
    }

    /**
     * Display  the contact with shop.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display  the products in cart of user.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function cart(Request $request)
    {
        $products = Product::whereIn(
            'id',
            $this->filter_session($request, 'cart')
        )->get();

        return view(
            'cart',
            ['products' => $products]
        );
    }

    /**
     * Display  the liked products of user.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function liked_product(Request $request)
    {
        $products = Product::whereIn(
            'id',
            $this->filter_session($request, 'like')
        )->paginate(9);

        return view(
            'liked',
            ['products' => $products]
        );
    }

    /**
     * Put to liked product in session of user.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function put_to_liked(Request $request, $id)
    {
        if ($id != $request->session()->get('like' . $id)) {
            $request->session()->put('like' . $id, $id);
            return response()->json(['answer' => 200]);
        } else {
            return response()->json(['answer' => 400]);
        }
    }

    /**
     * Put to cart product in session of user.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function put_to_cart(Request $request, $id)
    {
        if ($id != $request->session()->get('cart' . $id)) {
            $request->session()->put('cart' . $id, $id);
            return response()->json(['answer' => 200]);
        } else {
            return response()->json(['answer' => 400]);
        }
    }

    /**
     * Drop product from cart product in session of user.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function drop_from_cart(Request $request, $id)
    {
        if ($request->session()->has('cart' . $id)) {
            $request->session()->forget('cart' . $id);
            return response()->json(['answer' => 200]);
        } else {
            return response()->json(['answer' => 400]);
        }
    }

    /**
     * Check cart and liked product in session of user.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request, $id)
    {
        $answer = [];
        if ($id == $request->session()->get('like' . $id)) {
            $answer['answer_for_like'] = 200;
        } else {
            $answer['answer_for_like'] = 400;
        }
        if ($id == $request->session()->get('cart' . $id)) {
            $answer['answer_for_cart'] = 200;
        } else {
            $answer['answer_for_cart'] = 400;
        }

        return response()->json($answer);
    }
}
