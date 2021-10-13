<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index(){
        //$articles = Article::all();
        //$articles = Article::orderBy('published_at', 'desc')->latest('created_at', 'desc')->get();
        $articles = Article::latest('published_at')->latest('created_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(ArticleRequest $request){
        //$inputs = \Request::all();
        //dd($inputs); formの入力内容を表示して終了、DBには影響しない
        
        //$rules = [
        //    'title' => 'required|min:3',
        //    'body' => 'required',
        //    'published_at' => 'required|date'
        //];
        //$validated = $this->validate($request, $rules);
        Article::create($request->validated());
        return redirect('articles');
    }
}
