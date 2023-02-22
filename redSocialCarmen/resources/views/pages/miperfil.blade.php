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
                <p>{{$user->getFriendsCount()}}</p>
                <p>Mis amigos</p>
            </div>
        </div>

    </section>

    <section class="imagenes_subidas">
        <div class="flex flex-row m-2">
            <div class="m-3 col-span-5 bg-gray-500 rounded-lg w-1/4 shadow-lg shadow-cyan-900">
                <h3 class="m-3 text-slate-900 font-semibold text-xl">Solicitudes Pendientes</h3>
                @foreach($solicitudes as $solicitud)
                    @if($solicitud->name != $user->name)
                    <div class="m-2 flex p-1">
                        <p class="text-white">{{$solicitud->name}} quiere ser tu amigo</p>
                        <a href="{{route('acceptFriend', ['id'=>$solicitud->id])}}" class="ml-3 text-white hover:text-green-500" >Aceptar</a>
                        <a href="{{route('cancelFriend', ['id'=>$solicitud->id])}}" class="ml-3 text-white hover:text-crimson" >Denegar</a>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="m-5 w-2/3">
                @foreach($images as $image)
                    <div class="m-2">
                        <img class="w-full rounded" src="{{asset('img_red/'.$image->image_path)}}" alt="{{$image->description}}">
                    </div>
                    <div>
                        <p class="">Les gusta a {{count($image->likes)}} personas</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
