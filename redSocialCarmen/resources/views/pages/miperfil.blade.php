<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi perfil') }}
        </h2>
    </x-slot>
    <div class="mt-5 md:mt-0 md:col-span-2 bg-gris">
        <div class="text-center">
            <h2>Mis imágenes</h2>
        </div>
        <div class="container lg:flex sm:flex">
            @foreach($images as $image)
                <div class="px-4 mb-6 flex-grow">
                    <img class="w-max" src="{{asset('img_red/'.$image->image_path)}}" alt="{{$image->description}}">
                    <p>Les gusta a {{count($image->likes)}} personas</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
