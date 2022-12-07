<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::get();
        return view('admin.post_show', compact('posts'));
    }
}
