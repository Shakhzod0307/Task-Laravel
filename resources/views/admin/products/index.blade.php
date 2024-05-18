@extends('layout')
@section('content')

    <section class="h-screen  bg-gradient-to-br from-pink-50 to-indigo-100 p-8">
        @if(session('success'))
            <div class="mb-4 text-green-600 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 text-red-600 text-center font-semibold">
                {{ session('error') }}
            </div>
        @endif
        <div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 ">
            @foreach($products as $product)
                <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
                        <img class="h-56 lg:h-60 w-full object-cover" src="{{ Storage::url($product->picture)}}" alt="" />
                    <div class="p-3">
                        <span class="text-sm font-bold text-blue-500 text-primary"><a href="{{route('categories.show',$product->category->id)}}">Category:  {{$product->category->title}}</a></span>
                        <h3 class="font-semibold text-xl leading-6 text-red-500 my-2">
                            {{$product->name}}
                        </h3>
                        <p class="paragraph-normal text-gray-600">
                            {{$product->short_description}}
                        </p>
                        <a class="mt-3 block" href="{{route('products.show',$product->id)}}">Read More >></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
