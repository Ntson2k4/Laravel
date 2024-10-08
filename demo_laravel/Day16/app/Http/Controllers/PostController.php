<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return "welcome, user ";
    }

    public function show($id){
        return "Welcome user with ID: " . $id;
    }
}
