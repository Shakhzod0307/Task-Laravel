<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::all();
        return view('admin.pages.index',compact('pages'));
    }


    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        Pages::create($request->all());
        return back()->with('success','New Page created successfully!');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Pages::find($id);
        return view('admin.pages.edit',compact('page'));
    }

    public function update(UpdatePageRequest $request, string $id)
    {
        $page = Pages::find($id);
        $page->update($request->all());
        return back()->with('success','Page updated successfully!');
    }

    public function destroy(string $id)
    {
        Pages::destroy($id);
        return back()->with('success','Page deleted successfully!');
    }
}
