@extends('layout')
@section('content')
    <div class="mx-auto max-w-screen-lg overflow-hidden rounded-lg bg-white shadow">
        <div class="h-75  overflow-hidden flex items-center justify-center">
            <img style="width: 300px"
                src="{{ Storage::url($product->picture)}}"
                class="w-full object-cover h-full "
            alt=""
            />
        </div>
        <div class="p-4">
            <p class="mb-1 text-sm text-primary-500"><a href="{{route('categories.show',$product->category->id)}}"><time class="font-bold text-blue-500"> Category: {{$product->category->title}}</time></a></p>
            <p class="mb-1 text-lg text-primary-500"><time class="font-bold text-red-500">{{$product->name}}</time></p>
            <h3 class="text-xl font-medium text-gray-900">{{$product->short_description}}</h3>
            <p class="mt-1 text-gray-500">{{$product->full_description}}</p>
            <div class="mt-4 flex gap-2">
                <div class="flex items-center flex-wrap ">
                    <a href="{{route('products.edit',$product->id)}}" class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md mr-2  shadow-cla-blue px-5 py-1 rounded-lg">Edit</a>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
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
@endsection
