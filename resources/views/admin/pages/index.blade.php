@extends('layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    <section class="text-gray-600 body-font">
        @if(session('success'))
            <div class="mb-4 text-green-600 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif
        <div class="container px-5 py-5 mx-auto">
            @foreach($pages as $page)
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/1">
                    <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$page->title}}</h2>
                            <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{$page->short_description}}</h1>
                            <p class="leading-relaxed mb-3">{{$page->full_description}}</p>
                            <div class="flex items-center flex-wrap ">
                                <a href="{{route('pages.edit',$page->id)}}" class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">Edit</a>
                                <form action="{{route('pages.destroy',$page->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gradient-to-r from-red-400 to-red-400 hover:scale-105 drop-shadow-md  shadow-cla-red px-4 py-1 rounded-lg">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
