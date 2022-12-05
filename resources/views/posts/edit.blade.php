@extends('layouts.app')
@section('content')
        <div class="w-4/5 m-auto text-left">
        <div class="py-16 border-b border-gray-200">
            <h1 class="text-6xl">
                Update Post
            </h1>
        </div>
        </div>
        <div class="w-4/5 m-auto">
            <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-12 py-3">
                    <label for="title" class="block mb-3 text-2xl font-medium text-gray-900 ">Title</label>
                    <input type="text" id="title" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-200" required value="{{ $post->title }}">
                </div>
                <div class="py-3">
                    <label for="message" class="block mb-3 text-2xl  font-medium text-gray-900">Description</label>
                    <textarea id="message" name="description" rows="4" class="block p-2.5  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-200">{{ $post->description }}</textarea>
                </div>

                <div class="sm:grid grid-cols-2 place-items-stretch gap-0 w-full py-3">
                    <img src="/images/{{ $post->image_path }}" class="w-64 h-64" alt="">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 bg-gray-200 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" name="image" type="file" class="hidden" />
                    </label> 
                
                </div> 
            <button type="submit" class="bg-yellow-600 uppercase  text-white text-md font-extrabold py-3 my-5 px-5 rounded hover:bg-yellow-700">
                Submit
            </button>
                
            </form> 

        </div>
@endsection