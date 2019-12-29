<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Http\Requests\ShopsRequest;

class ShopsController extends Controller
{
    public function index() {

        $shops = Shop::orderBy('created_at', 'desc')->with('managers')->limit(10)->get();
        $count = Shop::all()->count();
        $response = [
            'shops' => $shops,
            'count' => $count
        ];
            
        return json_encode(array('response' => $response));
        // return $shops;
    }

    public function getMore(Request $request) {
        $offset = $request->query('offset');
        $shops = Shop::orderBy('created_at', 'desc')->with('managers')->limit(10)->offset($offset)->get();
        
        return $shops;
    }

    public function shopById($id) {
        $shop = Shop::find($id);
        $articles = $shop->articles;
        $response = [
            'articles' => $articles,
            'shop' => $shop
        ];
            
        return json_encode(array('response' => $response));
    }

    public function findArticle($id) {
        $shop = Shop::find($id);
        return $shop->articles();
    }

    public function store(ShopsRequest $request) {
        $shop = new Shop();
        $shop->name = $request->input('name');
        $shop->logo = $request->input('logo');

        $shop->save();
        if ($request->input('managerId')) {
            $manager = User::find($request->input('managerId'));
            $shop->managers()->save($manager);
        }
    }
}
