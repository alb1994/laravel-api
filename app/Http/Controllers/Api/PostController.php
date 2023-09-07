<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
       //$posts = Post::all(); 
       $posts = Post::with('category', 'tags')->paginate(4);
       return response()->json([
           'success' => true, 
            'results' => $posts
        ]); 
    }
    //aggiungo show
    public function show($slug){
        $post= Post::with('category','tags')->where('slug', $slug)->first();
        //verifico se c'è qualcosa all' interno del database e dunque success avra' valore
        if($post){
            return response()->json([
                'success' => true,
                'post' => $post
            ]);
        }
        else{
            return response()->json([
            'success' => false,
            'error' => 'Nesssun post trovato'
            ]);
        }
    }
}