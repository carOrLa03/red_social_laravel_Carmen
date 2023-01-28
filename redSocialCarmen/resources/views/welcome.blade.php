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

                </div>
            </div>
        </div>
    </section>
    <section>
    </section>

@endsection
@section('footer')
    @parent
@endsection
