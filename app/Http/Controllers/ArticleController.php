<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // GET api/articles
    public function index()
    {
        return Article::all();
    }

    // GET api/articles/{id}
    public function show($id)
    {
        return Article::find($id);
    }

    // POST api/articles
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    // PUT api/articles/{id}
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->update($request->all());
        return response()->json($article, 200);
    }
 // DELETE api/articles/{id}
 public function destroy($id)
 {
     Article::destroy($id);
     return response()->json(null, 204);
 }
   
}

