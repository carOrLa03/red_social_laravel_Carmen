<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'@'.$user->user_name }}
        </h2>
    </x-slot>
    <section class="text-center">
        <div>
            <div class="flex justify-around m-2">
                <div>
                    <img class="w-10 rounded-full" src="{{asset('storage/'.$user->profile_photo_path)}}" alt="photo">
                </div>
                <div class="text-white">
                    <p>{{$user->name}} {{$user->surname}}</p>
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div class="text-white flex justify-center m-5 p-2 bg-gray-500 rounded-lg shadow-lg shadow-cyan-900">
                <div class="p-3 text-center">
                    <p>{{count($images)}}</p>
                    <p> Publicaciones</p>
                </div>
                <div class="p-3 text-center">
                    <p>{{$user->getFriendsCount()}}</p>
                    <p>Amigos</p>
                </div>
            </div>
            <div class="flex justify-evenly m-2 p-2">
{{-- SI EL USUARIO AUTENTICADO YA ES AMIGO DEL PERFIL VISITADO, NO LE SALDRÁ EL BOTON DE SER AMIGOS--}}
{{--                (Auth::user()->getFriendship($user)->status != 1) || (Auth::user()->getFriendship($user)->status == null) --}}
                @if(!($user->isFriendWith(Auth::user())))
                <div class="w-32 p-3 bg-gray-900 rounded shadow-lg shadow-cyan-800 hover:bg-gray-700">
                    <a class="text-white " href="{{route('sendFriend', ['id'=>$user->id])}}">Ser amigo</a>
                </div>
                @endif
            </div>
        </div>
        <section class="images flex flex-row m-2">
            <div class="m-2 col-span-5 ">
                <div class="m-5 w-2/3">
                    @foreach($images as $image)
                        <div class="m-2">
                            <img class="w-full rounded" src="{{asset('img_red/'.$image->image_path)}}" alt="{{$image->description}}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="m-3 col-span-5 bg-gray-500 rounded-lg w-1/4 shadow-lg shadow-cyan-900">
                <h3 class="m-3 text-slate-900 font-semibold text-xl">Mis amigos</h3>
                @foreach($misamigos as $amigo)
                    <div class="m-2 flex p-1">
                        <p class="text-white">{{$amigo->name}}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </section>
</x-app-layout>
