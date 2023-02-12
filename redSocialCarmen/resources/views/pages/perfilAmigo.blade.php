<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'@'.$user->user_name }}
        </h2>
    </x-slot>
    <section class="text-center">
        <div>
            <div>
                <p>{{$user->name}} {{$user->surname}}</p>
                <p>{{$user->email}}</p>
            </div>
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
        </div>
        <div class="m-5">
            @foreach($images as $image)
                <div class="m-2 w-3/4">
                    <img class="w-full rounded" src="{{asset('img_red/'.$image->image_path)}}" alt="">
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
