<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("Client.index");
    }

    public function category(){
        return view("Client.category");
    }

    public function about(){
        return view("Client.about");
    }

    public function detailPost($id){
        return view("Client.detailPost");
    }
}
