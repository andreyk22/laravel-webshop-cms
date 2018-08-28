<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Product;
use App\About;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $products = Product::orderBy('id', 'desc')->take(3)->get();
        return view('pages.index')
        ->with('posts', $posts)
        ->with('products', $products);
    }
    public function about()
    {
        $about = About::all();
        return view('pages.about')->with('about', $about);
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function NotAdmin()
    {
        return view('pages.notadmin');
    }
}
