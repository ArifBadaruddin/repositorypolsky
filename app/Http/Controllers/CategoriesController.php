<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function idex(){

        return view('dashboard.posts.index',[
            // untuk memanggil semua post
            'category' =>category::all() 

            // show karya ilmiha only user
            // 'posts' =>post::where('user_id', auth()->user()->id)->get() 
        ]);
    }
}
