<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi perfil') }}
        </h2>
    </x-slot>
    <section class="info">
        <div class="flex justify-center m-5">
            <div class="m-2 text-center">
                <p>{{count($images)}}</p>
                <p> Publicaciones</p>
            </div>
            <div class="m-2 text-center">
                <p>100</p>
                <p>Seguidores</p>
            </div>
            <div class="m-2 text-center">
                <p>3</p>
                <p>Siguiendo</p>
            </div>
        </div>

    </section>

    <section class="imagenes_subidas">
        <div class="mt-5 md:mt-0 md:col-span-2 bg-gris">
            <div class="text-center">
                <h2>Mis imágenes</h2>
            </div>
            <div class="container-fluid flex">
                @foreach($images as $image)
                    <div class="row m-2 bg-indigo-50 rounded w-3/4">
                        <div class="p-2">
                            <div class="px-4 mb-6">
                                <img class=" w-full rounded" src="{{asset('img_red/'.$image->image_path)}}" alt="{{$image->description}}">
                            </div>
                            <div>
                                <p class="">Les gusta a {{count($image->likes)}} personas</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
