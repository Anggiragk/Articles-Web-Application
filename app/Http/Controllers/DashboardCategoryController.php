<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('isAdmin');
        return view('dashboard.category.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('categories-image');
        }

        try {
            Category::create($validated);
            return redirect('/dashboard/category')->with('success', "Success add new category :D");
        } catch (\Throwable $e) {
            return redirect('/dashboard/category')->with('failed', "Failed add new category, " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        Gate::authorize('isAdmin');
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        Gate::authorize('isAdmin');
        return view('dashboard.category.update', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('isAdmin');

        $data = [
            'name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:1024'
        ];
        if ($request->slug != $category->slug) {
            $data['slug'] = 'required';
        }
        try {
        $validated = $request->validate($data);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('category-images');
        }
            $update = Category::where('id', $category->id)->update($validated);
            throw_if($update <= 0," no row affected");
            return redirect('/dashboard/category')->with('success', "Category has been updated");
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect('/dashboard/category')->with('failed', "Category failed to update, " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        try {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $delete = Category::destroy($category->id);
            throw_if($delete <= 0);
            return redirect('/dashboard/category')->with('success', 'category has been deleted');
        } catch (\Throwable $th) {
            return redirect('/dashboard/category')->with('failed', 'Delete category failed, ' . $th->getMessage());
        }
    }
}
