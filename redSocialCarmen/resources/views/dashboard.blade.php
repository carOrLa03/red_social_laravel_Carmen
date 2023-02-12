
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Red social') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($images as $image)
                <div class="flex justify-between">
                    <p>{{$image->user->name . ' '. $image->user->surname}}</p>
                    <p>{{$image->description}} </p>
                </div>
                <img src="{{asset('img_red/'.$image->image_path)}}">
                <p class="text-white">Les gusta a {{count($image->likes)}} personas</p>
            <div class="flex justify-between m-2">
                <a href="{{ route('showImage', ['id'=>$image->id]) }}" class="text-white">Ver los {{count($image->comments)}} comentarios </a>

                <p>
                        @if(($image->likes->where('user_id', \Illuminate\Support\Facades\Auth::id())->where('image_id', $image->id))->isEmpty())
                        <svg id="img_heart" data-id="{{$image->id}}" viewBox="0 0 24 24" class="fill-none"  xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12.62 20.8101C12.28 20.9301 11.72 20.9301 11.38 20.8101C8.48 19.8201 2 15.6901 2 8.6901C2 5.6001 4.49 3.1001 7.56 3.1001C9.38 3.1001 10.99 3.9801 12 5.3401C13.01 3.9801 14.63 3.1001 16.44 3.1001C19.51 3.1001 22 5.6001 22 8.6901C22 15.6901 15.52 19.8201 12.62 20.8101Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <img id="img_corazon" class="w-8" src="http://www.w3.org/2000/svg" alt="">

                        @else
                        <svg id="img_heart" data-id="{{$image->id}}" viewBox="0 0 24 24" class="fill-red-600"  xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12.62 20.8101C12.28 20.9301 11.72 20.9301 11.38 20.8101C8.48 19.8201 2 15.6901 2 8.6901C2 5.6001 4.49 3.1001 7.56 3.1001C9.38 3.1001 10.99 3.9801 12 5.3401C13.01 3.9801 14.63 3.1001 16.44 3.1001C19.51 3.1001 22 5.6001 22 8.6901C22 15.6901 15.52 19.8201 12.62 20.8101Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <img id="img_corazon" class="w-8" src="http://www.w3.org/2000/svg" alt="">
                        @endif

                </p>
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

    <script>
        // const corazon = document.getElementById('img_corazon')
        const heart = document.getElementById('img_heart');
        const id = heart.dataset.id;

        heart.addEventListener('click', () =>{
            console.log('hola')
            heart.classList.toggle('fill-red-600')
            if(heart.classList.contains('fill-red-600')){
                fetch(`http://redsocialcarmen.com/dashboard/like/${id}`)
            }else{
                fetch(`http://redsocialcarmen.com/dashboard/dislike/${id}`)
            }
        });



    </script>


</x-app-layout>
