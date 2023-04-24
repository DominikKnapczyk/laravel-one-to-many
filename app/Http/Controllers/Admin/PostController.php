<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use App\Models\Technology;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // fetch all categories
        $technologies = Technology::all();
        return view('admin.posts.create', compact('categories', 'technologies'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'image' => 'required|url',
            'category_id' => 'required|exists:categories,id' // validation rule for category_id
        ]);
    
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->slug = Str::slug($validatedData['title']);
        $post->text = $validatedData['text'];
        $post->image = $validatedData['image'];
        $post->category_id = $validatedData['category_id']; // assign category id to post
    
        if (!$post->save()) {
            return redirect()->back()->withErrors('Si è verificato un errore durante il salvataggio del post.');
        }

         // sync the technologies associated with the post
         $post->technologies()->sync($request->input('technologies', []));
    
        return redirect()->route('admin.posts.index')->with('status', 'Il post è stato pubblicato correttamente!');
    }
    
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $technologies = $post->technologies; // fetch technologies related to the post
        return view('admin.posts.show', compact('post', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('admin.posts.index')->with('status', 'Post eliminato correttamente');
    }
}
