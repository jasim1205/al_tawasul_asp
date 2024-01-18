<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Backend\User;


class HomeController extends Controller
{
    public function index(){
        $product = Product::latest()->get();
        $user = User::find(currentUserId());
        return view('home',compact('product','user'));
    }
}
