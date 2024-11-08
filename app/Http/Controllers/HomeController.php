<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke()
    {
        $mainCategories = Category::whereNull('parent_id')->get();

        return view('home', compact('mainCategories'));
    }
}
