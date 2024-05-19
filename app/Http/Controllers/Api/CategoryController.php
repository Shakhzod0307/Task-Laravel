<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $imagePath = $request->file('picture')->store('public');
        $data['picture'] = $imagePath;
        $category = Category::create($data);
        return response()->json([
            'message' => 'Category created successfully!',
        ]);
    }

    public function update(UpdateCategoryRequest $request,string $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request['title'];
        $category->short_description = $request['short_description'];
        $category->full_description = $request['full_description'];
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public');
            $category->picture = $path;
        }
        $category->save();
        return response()->json([
            'message' => 'Category created successfully!',
        ]);
    }
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully!',
        ]);
    }

}
