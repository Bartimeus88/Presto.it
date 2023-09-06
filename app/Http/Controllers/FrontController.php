<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home () {

        $annuncements = Annuncement::take(6)->get()->sortByDesc('created_at');

        return view('home.index', compact('annuncements'));
    }

    public function categoryShow(Category $category){
        return view('category.show',compact('category'));
    }
}
