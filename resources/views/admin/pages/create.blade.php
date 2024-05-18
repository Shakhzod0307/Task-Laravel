@extends('layout')
@section('content')
    <form action="{{route('pages.store')}}" method="POST" class="bg-white shadow p-4 py-8" >
        @csrf
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">New Page</div>
        @if(session('success'))
            <div class="mb-4 text-green-600 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" name="title" placeholder="Title" type="text" required>
            <textarea class="description bg-gray-100 sec p-3 mb-4 h-40 border border-gray-300 outline-none" spellcheck="false" name="short_description" required placeholder="Describe short description about this page here"></textarea>
            <textarea class="description bg-gray-100 sec p-3 mb-4  h-60 border border-gray-300 outline-none" spellcheck="false" name="full_description" required placeholder="Describe full description about this page here"></textarea>
            <div class="buttons flex justify-end">
                <button class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
            </div>
        </div>
    </form>
@endsection
