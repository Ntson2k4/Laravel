<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class PostController extends Controller
{
    //
    public function index(){
        $getAll=DB::table('posts')->select('*')->get();
        return view('posts.index',compact('getAll'));
    }
}
