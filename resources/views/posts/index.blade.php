@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto">
    <div class="py-16 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
    @if (Auth::check())
    <div class="pt-16 w-4/5">
        <a href="/blog/create" class="bg-yellow-600 uppercase  text-white text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-yellow-700">
            Create Post 
        </a>
    </div>
    @endif
    @foreach ($posts as $post)
        
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-16 border-b border-gray-200">
        <div>
            <img src="/images/{{ $post->image_path }}" width="700" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>
            <span class="text-gray-500">
                Post By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span><br> <span class="block py-2">Created On: {{ date('jS M Y',strtotime($post->updated_at)) }}</span>
            </span>
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>
            <button class="text-center bg-yellow-600 text-white py-2 px-4 font-bold text-lg rounded hover:scale-110 transition-all">
                <a href="/blog/{{ $post->slug }}">
                    Keep Reading
                </a>
            </button>
            <span class="float-right">
                <a href="/blog/{{ $post->slug }}/edit" class="mx-3 text-yellow-600 italic hover:text-yellow-700 pb-1 text-sm">UPDATE</a>
            </span>
            <span class="float-right">
                <form action="/blog/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="mx-3 text-red-600 italic hover:text-red-700 pb-1 text-sm">
                    DELETE
                </button>
                </form>
            </span>
        </div>
    </div>
    @endforeach
</div>
@endsection