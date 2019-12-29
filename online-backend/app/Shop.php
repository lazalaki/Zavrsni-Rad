<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Article;

class Shop extends Model
{
    public function managers() {
        return $this->belongsToMany(User::class, 'user_shop');
    }

    public function articles() {
        return $this->belongsToMany(Article::class, 'shop_article');
    }
}
