<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $mainCategories = Category::whereNull('parent_id')->get();

        return view('home', compact('mainCategories'));
    }
}
