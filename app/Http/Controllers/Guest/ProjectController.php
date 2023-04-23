<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('guest.projects', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('guest.showProjects', compact('post'));
    }
}
