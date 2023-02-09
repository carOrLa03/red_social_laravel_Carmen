<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <section  class="flex justify-center m-3">
        <div class="">
            <div>
                <p class="text-white">Busca a tu amigo ...</p>
            </div>
            <div class="hidden sm:block">
                <label class="sr-only" for="search"> Search </label>
                <input
                    class="h-10 w-full rounded-lg border-none bg-white pl-4 pr-10 text-sm shadow-sm sm:w-56"
                    id="search"
                    type="search"
                    placeholder="Search website..."
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
            </div>
        </div>

    </section>

    <section>
        <div>
            @foreach($users as $user)
                <div class="flex border-gray-500 border-b-2 m-3 justify-between items-center  shadow-lg">
                    <div class="m-1">
                        <img class="rounded-full w-10" src="{{asset('storage/'.$user->profile_photo_path)}}" alt="hola">
                    </div>
                    <div class="m-1">
                        <p>{{'@'.$user->user_name}}</p>
                         <p class="text-white">{{$user->name}} {{$user->surname}}</p>
                    </div>
                    <div class="m-1">
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
                    </div>

                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
