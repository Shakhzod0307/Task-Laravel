@extends('layout')
@section('content')
    <form action="{{route('pages.update',$page->id)}}" method="POST" class="bg-white shadow p-4 py-8" >
        @csrf
        @method('PUT')
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">Update Page</div>
        @if(session('success'))
            <div class="mb-4 text-green-600 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <textarea class="description bg-gray-100 sec p-3 mb-4 h-20 border border-gray-300 outline-none" spellcheck="false" name="title" required >{{$page->title}}</textarea>
            <textarea class="description bg-gray-100 sec p-3 mb-4 h-40 border border-gray-300 outline-none" spellcheck="false" name="short_description" required >{{$page->short_description}}</textarea>
            <textarea class="description bg-gray-100 sec p-3 mb-4  h-60 border border-gray-300 outline-none" spellcheck="false" name="full_description" required >{{$page->full_description}}</textarea>
            <div class="buttons flex justify-end">
                <button class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
            </div>
        </div>
    </form>
@endsection
