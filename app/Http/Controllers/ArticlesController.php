<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        //$articles = Article::all();
        //$articles = Article::orderBy('published_at', 'desc')->latest('created_at', 'desc')->get();
        $articles = Article::latest('published_at')->latest('created_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article){
        //$article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create(){
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.create', compact('tag_list'));
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
        //Article::create($request->validated());
        $article = Auth::user()->articles()->create($request->validated());
        $article->tags()->attach($request->input('tags'));
        return redirect()->route('articles.index')->with('message', '記事を追加しました');;
    }

    public function edit(Article $articles){
        //$article = Article::findOrFail($id);
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tag_list'));
    }

    public function update(ArticleRequest $request, Article $article){
        //$article = Article::findOrFail($id);
        $article->update($request->validated());
        $article->tags()->sync($request->input('tags'));
        return redirect()->route('articles.show', [$article->id])->with('message', '記事を更新しました');;
    }

    public function destroy(Article $article){
        //$article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('message', '記事を削除しました');
    }
}
