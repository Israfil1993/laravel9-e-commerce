<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{


    public function index()
    {

        $categoies = Category::where('parent_id', 0 AND 'status', '1')->with('children')->get();

        return view ('frontend.pages.home.index', compact('categoies'));
    }
}
