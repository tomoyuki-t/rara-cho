<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        $inputs = \Request::all();
        //dd($inputs); formの入力内容を表示して終了、DBには影響しない
        Article::create($inputs);
        return redirect('articles');
    }
}
