<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manager;

class Shop extends Model
{
    public function managers() {
        return $this->belongsToMany(Manager::class, 'users_shop');
    }
}
