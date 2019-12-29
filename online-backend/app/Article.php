<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;

class Article extends Model
{
    protected $table = 'article';

    public function shops() {
        return $this->belongsToMany(Shop::class, 'shop_article');
    }
}
