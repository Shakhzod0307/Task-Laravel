<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        return ProductResource::collection($products);
    }

    public function show(string $id)
    {
        $product = Products::findOrFail($id);
        return new ProductResource($product);
    }

}
