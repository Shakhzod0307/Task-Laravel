<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::with('category')->get();
//        dd($products);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $imagePath = $request->file('picture')->store('public');
        $data['picture'] = $imagePath;
        $product = new Products();
        $product->category_id = $data['category_id'];
        $product->name = $data['name'];
        $product->picture = $data['picture'];
        $product->short_description = $data['short_description'];
        $product->full_description = $data['full_description'];
        if ($product->save()){
            return back()->with('success','New Product created successfully!');
        }
        return back()->with('error','Oops, Something went wrong!');
    }

    public function show(string $id)
    {
        $product = Products::with('category')->find($id);
        return view('admin.products.show',compact('product'));
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Products::with('category')->find($id);
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->validated();
        $product = Products::find($id);
        $product->category_id = $request['category_id'];
        $product->name = $data['name'];
        $product->short_description = $data['short_description'];
        $product->full_description = $data['full_description'];
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public');
            $product->picture = $path;
        }
        $product->save();
        return back()->with('success','Product updated successfully!');
    }

    public function destroy(string $id)
    {
        Products::destroy($id);
        return redirect()->route('products.index')->with('success','Products deleted successfully!');
    }
}
