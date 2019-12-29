<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Shop;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function store(ArticleRequest $request, $id) {
        $article = new Article();

        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $article->description = $request->input('description');
        $article->url = $request->input('url');

        $article->save();

        $shop = Shop::find($id);
        $article->shops()->save($shop);
    }   
}
