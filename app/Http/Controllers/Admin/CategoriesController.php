<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $imagePath = $request->file('picture')->store('public');
        $data['picture'] = $imagePath;
        $category = Category::create($data);
        if ($category){
            return back()->with('success','New Category created successfully!');
        }
        return back()->with('error','Oops, Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->short_description = $data['short_description'];
        $category->full_description = $data['full_description'];
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public');
            $category->picture = $path;
        }
        $category->save();
        return back()->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success','Category deleted successfully!');
    }
}
