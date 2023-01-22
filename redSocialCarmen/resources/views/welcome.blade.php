@extends('layouts.master')
@section('header')
    @parent
@endsection
@section('content')
    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                <div class="p-6">
                    <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded" src="{{asset('images/img-carrusel/img2.jpg')}}" alt="blog">

                    <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">Contacta con tus amigos cuando quieras</h1>
                    <p class="mx-auto text-base leading-relaxed text-gray-500">Free and Premium themes, UI Kit's, templates and landing pages built with Tailwind CSS, HTML &amp; Next.js.</p>

                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600" title="read more"> Read More » </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="flex flex-wrap justify-center p-6">
                @foreach($images as $image)
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded md:rounded-l-lg" src="{{$image->image_path}}" alt="imagen">
                        <div class="p-6 flex flex-col justify-start">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                            <p class="text-gray-700 text-base mb-4">{{$image->description}}</p>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>

@endsection
@section('footer')
    @parent
@endsection
