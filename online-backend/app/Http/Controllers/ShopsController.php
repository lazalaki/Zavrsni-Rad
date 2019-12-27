<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Http\Requests\ShopsRequest;

class ShopsController extends Controller
{
    public function index() {

        $shops = Shop::all();
        return $shops;
    }

    public function shopById($id) {
        $shop = Shop::find($id);
        return $shop;
    }

    public function store(ShopsRequest $request) {
        $shop = new Shop();
        $shop->name = $request->input('name');
        $shop->logo = $request->input('logo');

        $shop->save();

        $manager = User::find($request->input('managerId'));
        // $managersTosave[] = $manager;
        // $shop->managers()->saveMany($managersTosave);
        $shop->managers()->save($manager);
    }
}
