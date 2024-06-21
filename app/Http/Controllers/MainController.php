<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display the Index Page
     */
    public function index()
    {
        // Load Articles
        $articles = Article::latest()->paginate(9);

        // Cut Body Lengh
        foreach($articles as $art){
            $art->body = substr($art->body, 0, 150);
        }

        return view('index')->with('articles', $articles);

    }

}
