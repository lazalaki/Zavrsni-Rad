<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Shop extends Model
{
    public function managers() {
        return $this->belongsToMany(User::class, 'user_shop');
    }
}
