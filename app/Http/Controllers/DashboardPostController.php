<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidPostException;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts', [
            'posts' => Post::where('author_id', auth()->user()->id)->with(['author', 'category'])->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);
        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('article-images');
        }
        $validated['author_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        try {
            Post::create($validated);
            return redirect('/dashboard/post')->with('success', "Success add new article :D");
        } catch (\Throwable $e) {
            return redirect('/dashboard/post')->with('failed', "Failed add new article, ".$e->getMessage());
        }
    }

    public function show(Post $post)
    {
        return view('dashboard.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.update', [
            'post' => $post,
            'categories' => Category::all()
        ]);
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
        $data = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];
        if ($request->slug != $post->slug) {
            $data['slug'] = 'required';
        }
        try {
        $validated = $request->validate($data);
        $validated['author_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('article-images');
        }
            $update = Post::where('id', $post->id)->update($validated);
            throw_if($update <= 0," no row affected");
            return redirect('/dashboard/post')->with('success', "Article has been updated");
        } catch (\Throwable $e) {
            // throw new InvalidPostException("Failed update article ".$th->getMessage());
            Log::error($e->getMessage());
            return redirect('/dashboard/post')->with('failed', "Article failed to update, ".$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            if($post->image){
                Storage::delete($post->image);
            }
            $delete = Post::destroy($post->id);
            throw_if($delete<=0);
            return redirect('/dashboard/post')->with('success', 'Article has been deleted');
        } catch (\Throwable $th) {
            return redirect('/dashboard/post')->with('failed', 'Delete article failed, '.$th->getMessage());
        }
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        throw_if(!$slug);
        return response()->json(['slug' => $slug]);
    }
}
