<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sube Imágenes') }}
        </h2>
    </x-slot>
    <div class="text-center m-5">
        <h2 class="font-extrabold">Comparte tus fotos con los amigos o con quien tú quieras!!!</h2>
    </div>
    <div class="m-5 flex justify-center">
        <img class="h-36" src="{{asset('images/icons/logo.png')}}" alt="">
    </div>
    <div class="mt-5 md:mt-0 h-1/2 flex justify-center">
        <form action="{{ route('save_images') }}" method="post" class="w-1/3 m-6 rounded-lg bg-gris shadow-lg shadow-cyan-900" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-5 sm:p-6">
                <div class="m-2">
                    <x-jet-label>{{__('Sube tu foto favorita')}}</x-jet-label>
                    <input class="form-control" type="file"  name="image">
                </div>
                <div class="m-2">
                    <x-jet-label>{{__('Descripción')}}</x-jet-label>
                    <input class="form-control" type="text" name="description">
                </div>
                <div class="m-2">
                    <x-jet-button>{{__('Envía')}}</x-jet-button>
                </div>
            </div>

        </form>
    </div>
    <div class="text-center m-5">
        <h2 class="font-extrabold">Podrás ver tus fotos cuando te apetezca!!</h2>
        <p class="mx-auto text-base leading-relaxed text-gray-500">Sólo tendrás que iniciar sesión y las verás en el inicio, junto con las de tus amigos.</p>
    </div>
    <div class="text-center m-3">
        <h2 class="font-extrabold">No te pierdas lo que tus amigos tienen que contarte a través de sus fotos!!</h2>
        <p class="mx-auto text-base leading-relaxed text-gray-500">Y por supuesto, cuenta tus historias.</p>
    </div>
</x-app-layout>
