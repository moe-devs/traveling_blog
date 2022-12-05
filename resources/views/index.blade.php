@extends('layouts.app')
@section('content')
    <div class="background grid grid-cols-1 h-screen  m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto p-4 pb-16 sm:m-auto w-4/5 block text-center m-auto">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Are you passionate <br> about traveling?
                </h1>
                <button class="text-center bg-white text-yellow-600 py-2 px-4 font-bold text-xl uppercase rounded hover:scale-110 transition-all">
                    <a href="/blog">Read More</a>
                </button>
            </div>
        </div>
    </div>
    <h1 class="mt-12 text-center text-4xl font-bold text-yellow-600">Your Favorite Destination ?</h1>
    <div class="grid  md:grid-cols-2 lg:grid-cols-3 grid-cols-1  gap-20 w-screen justify-items-center mx-auto py-16 my-16">
        <div class="w-96 hover:scale-110 transition-all">
            <img src="https://cdn.pixabay.com/photo/2021/10/11/18/58/lake-6701636_1280.jpg" alt="">
            <h2 class="py-2 h2 text-2xl bg-yellow-600 text-center text-white">Mountains Place</h2>
        </div>
        <div class="w-96 hover:scale-110 transition-all">
            <img src="https://cdn.pixabay.com/photo/2015/03/09/18/34/beach-666122_1280.jpg" alt="">
            <h2 class="py-2 h2 text-2xl bg-yellow-600 text-center text-white">Beach Place</h2>
        </div>
        <div class="w-96 hover:scale-110 transition-all">
            <img src="https://cdn.pixabay.com/photo/2013/04/11/19/46/building-102840_1280.jpg" alt="">
            <h2 class="py-2 h2 text-2xl bg-yellow-600 text-center text-white">Touristic Place</h2>
        </div>
    </div>
    <div class="w-screen h-24 bg-yellow-600 flex justify-center items-center my-20">
        <q class="text-2xl text-white">
            <i>
                Travel is the only thing you buy that makes you richer
            </i>
        </q>
    </div>
    <div class="sm:grid w-4/5 grid-cols-2 gap-20 w-25 my-2 justify-items-center mx-auto py-16">
        <div>
            <img src="https://cdn.pixabay.com/photo/2016/11/22/19/25/man-1850181_1280.jpg" class="rounded" width="700" alt="">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
                The Most Important Benefits of Travelling
            </h2>
            <p class="py-8 text-gray-500  text-l">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus mollitia nihil voluptate pariatur, ea repellendus quidem qui rerum necessitatibus recusandae ex enim animi nesciunt corporis cumque. Molestiae, culpa. Cum, laborum.
            </p>
            <p class="font-extrabold text-gray-600 text-l pb-9">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. In rerum amet ut nemo et repellat. Fugiat quia quibusdam at aperiam corrupti molestiae voluptates laborum error dignissimos officia, harum dolore odit.
            </p>
            <button class="text-center bg-yellow-600 d-block text-white py-2 px-4 font-bold text-xl uppercase rounded hover:scale-110 transition-all">
                <a href="/blog">Find out more</a>
            </button>
        </div>
    </div> 
@endsection