
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Red social') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @foreach($images as $image)
                <div class="flex justify-between">
                    <p>{{$image->user->name . ' '. $image->user->surname}}</p>
                    <p>{{$image->description}} </p>
                </div>
                <img src="{{asset('img_red_social/'.$image->image_path)}}">
                <div class="flex justify-between">
                    <a href="{{ route('showImage', ['id'=>$image->id]) }}" class="text-pink-700">Ver detalles</a>
                    <p>{{count($image->comments)}} comentarios</p> {{-- cuenta los comentarios de cada foto --}}

                    {{--FORMULARIO PARA GUARDAR LOS LIKES--}}
                        <form action="#" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$image->user->id}}">
                            <input type="hidden" name="user_id" value="{{$image->id}}">
                        </form>
                    {{-- cuenta los likes que tiene cada foto --}}
                    <div>
                        {{count($image->likes)}} likes
                        <img src="{{asset('images/icons/corazon.svg')}}" alt="corazon" class="link_logo">
                    </div>
                </div>


                {{--      Diferencia entre la fecha actual y la subida a la red social      --}}
                <p>Hace {{$now->sub($image->created_at)->longAbsoluteDiffForHumans()}}</p>


                <div>
                    <form action="{{route('store')}}" class="mt-5 md:mt-0 md:col-span-2" method="post">
                        @csrf
                        <div>
                            <input type="hidden" name="imageId" value="{{$image->id}}">
                            <x-jet-label>Deja un comentario</x-jet-label>
                            <textarea class="border-gray-300 focus:border-pink-700 focus:ring-pink-800 rounded-md shadow-sm" name="content"></textarea>
                        </div>
                        <div>
                            <x-jet-button>Envía</x-jet-button>
                        </div>
                    </form>
                </div>
            @endforeach

        </div>
        <div>{{$images->links()}}</div>
    </div>

</x-app-layout>

