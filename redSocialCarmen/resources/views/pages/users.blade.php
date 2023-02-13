<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

{{--    INICIO BUSCADOR--}}
    <section  class="flex justify-center m-3">
        <div class="">
            <div class="hidden sm:block">
                <form action="{{route('buscador')}}" method="post">
                    @csrf
                    <label class="sr-only" for="search"> Search </label>
                    <input
                        class="h-10 w-full rounded-lg border-none bg-white pl-4 pr-10 text-sm shadow-sm sm:w-56"
                        id="search"
                        type="search"
                        name="buscar"
                        placeholder="Busca a tu amigo ..."
                    />
                    <x-jet-button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </x-jet-button>
                </form>

            </div>
        </div>
    </section>
    {{--   FIN BUSCADOR--}}
{{--    INICIO MUESTRA BUSQUEDAS  Y  SI NO TODOS LOS USUARIOS--}}
    <section>
        <div>
            @foreach($users as $user)
                <div class="flex border-gray-500 border-b-2 m-3 justify-between items-center  shadow-lg">
                    <div class="m-1">
                        <img class="w-10 rounded-full " src="{{asset('storage/'.$user->profile_photo_path)}}" alt="hola">
                    </div>
                    <div class="m-1">
                        <p>{{'@'.$user->user_name}}</p>
                        <p class="text-white">{{$user->name}} {{$user->surname}}</p>
                    </div>
                    <div class="m-1">
                        <form action="{{route('perfilAmigo')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <x-jet-button>
                                Ver Perfil
                                <svg
                                    class="ml-3 h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"
                                    />
                                </svg>
                            </x-jet-button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
