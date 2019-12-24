<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopsController extends Controller
{
    public function index() {

        $shops = Shop::all();
        return $shops;

    }
}
