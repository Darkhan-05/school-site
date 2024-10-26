<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['posts' => function ($query) {
            $query->limit(6); // Ограничиваем количество постов до 6 для каждой категории
        }])->get();

        return view("home", compact("categories"));
    }


    public function showPost(Post $post)
    {
        $categories = Category::all();
        return view("post", compact("post","categories"));
    }

    public function showCategory(Category $category)
    {
        $posts = Post::where("category", $category->id)->get();

        return view("category", compact("category"));
    }
}
