@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-16 text-center">
        <h1 class="text-5xl border-b pb-4">
            {{ $post->title }}
        </h1>
    </div>
    <div class="w-4/5 m-auto pt-4">
        <img src="/images/{{ $post->image_path }}" class="pt-0" alt="">
        <span class="text-gray-500 mt-2 block">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>,Created On: {{ date('D jS M Y',strtotime($post->updated_at)) }}
        </span>
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>
</div>
@endsection