<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ManagersRequest;

class ManagersController extends Controller
{

    public function index() {
        $managers = User::where('role', '=', 'Manager')->with('shops')->get();
        return $managers;
    }

    public function managersWithoutShop() {
        $managers = User::where('role', '=', 'Manager')->with('shops')->get();
        $returnList = [];
        foreach ($managers as $manager) {
            $shop = $manager->shops;
            if (count($shop) == 0) {
                $returnList[] = $manager;
            }
        }
        return $returnList;
    }

    public function store(ManagersRequest $request) {
        $manager = new User();

        $manager->firstName = $request->input('firstName');
        $manager->lastName = $request->input('lastName');
        $manager->email = $request->input('email');
        $manager->password = bcrypt($request->input('password'));
        $manager->url = $request->input('url');
        $manager->role = 'Manager';

        $manager->save();
    }

    public function show($id) {
        $manager = User::find($id);
        $shop = $manager->shops;
        $response = [
            'manager' => $manager,
            'shop' => $shop
        ];
            
        return json_encode(array('response' => $response));
    }
}
