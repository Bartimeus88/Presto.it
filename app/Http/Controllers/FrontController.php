<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home () {

        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');

        return view('home.index', compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('category.show',compact('category'));
    }
}
