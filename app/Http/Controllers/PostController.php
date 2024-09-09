<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // this method for create
    public function create()
    {
        return view("create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        //upload image
        $imageName = null;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // add new post
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        /* $post->image = time().'.'.$request->image->extension(); */
        $post->image = $imageName;

        $post->save();
        return redirect()->route('home')->with('success', 'Your post has been successfully created!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        //update post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        /* $post->image = time().'.'.$request->image->extension(); */

        //upload image
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }


        $post->save();
        return redirect()->route('home')->with('success', 'Your post has been successfully updated!');
    }


    // for delete
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Your post has been successfully deleted!');
    }

}
