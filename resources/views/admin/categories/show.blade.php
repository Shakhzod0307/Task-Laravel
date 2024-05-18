@extends('layout')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"/>

    <div class="flex mt-11 items-center justify-center">
        <div class="relative flex w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                <img src="{{Storage::url($category->picture)}}" alt="image" class="h-full w-full object-cover" />
            </div>
            <div class="p-6">
                <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                    {{$category->title}}
                </h6>
                <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    {{$category->short_description}}
                </h4>
                <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                    {{$category->full_description}}
                </p>
                <div class="flex space-x-2">
                    <a href="{{route('categories.edit',$category->id)}}" class="inline-block bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md shadow-cla-blue px-4 py-1 rounded-lg">Edit</a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-gradient-to-r from-red-400 to-red-400 hover:scale-105 drop-shadow-md shadow-cla-red px-4 py-1 rounded-lg">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
