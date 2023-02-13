@extends('layouts.master')
@section('header')
    @parent
@endsection
@section('content')
    <section>
        <div class="relative mx-auto px-5 py-12 md:px-12 lg:px-24 w-100">
            <h2 class="m-2 mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">Las redes sociales</h2>
            <p class="mx-auto text-base leading-relaxed text-gray-500">Las redes sociales son más que un fenómeno social, es algo que se ha integrado en la sociedad moderna y que representa para muchos un medio flexible que les permite interactuar con personas que comparten sus mismos intereses.</p>
        </div>

    </section>
    <section class="flex">
        <div class="relative items-center px-5 py-12 mx-auto md:px-12 lg:px-24 w-1/2">
            <div class="grid grid-cols-1 gap-6 mx-auto">
                <div class="p-6 bg-gray-400 rounded-lg shadow-lg shadow-cyan-900">
                    <img class="mx-auto object-cover rounded" src="{{asset('images/img-carrusel/img1.jpg')}}" alt="blog">

                    <h1 class="m-2 mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">Contacta con tus amigos cuando quieras!!!</h1>
                    <p class="mx-auto text-base leading-relaxed text-gray-500">He aquí mi secreto. que no puede ser más simple: solo con el corazón se puede ver bien; lo esencial es invisible a los ojos.</p>

                    <div class="mt-4">
                        <a href="#" class="inline-flex mt-4 font-semibold text-white lg:mb-0 hover:text-neutral-600" title="read more"> Leer más » </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative items-center px-5 py-12 mx-auto md:px-12 lg:px-24 w-1/2">
            <div class="grid grid-cols-1 gap-6 mx-auto">
                <div class="p-6 bg-gray-400 rounded-lg shadow-lg shadow-cyan-900">
                    <img class="mx-auto object-cover rounded" src="{{asset('images/img-carrusel/img2.jpg')}}" alt="blog">

                    <h1 class="m-2 mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">Conoce personas sin parar!!!</h1>
                    <p class="mx-auto text-base leading-relaxed text-gray-500">Los amigos son como los melones: de cien que pruebas, sólo sale uno bueno.</p>

                    <div class="mt-4">
                        <a href="#" class="inline-flex mt-4 font-semibold text-white lg:mb-0 hover:text-neutral-600" title="read more"> Leer más » </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

