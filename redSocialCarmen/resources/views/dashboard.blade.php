
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
            <div class="flex justify-between m-2">
                <a href="{{ route('showImage', ['id'=>$image->id]) }}" class="text-pink-700">Ver los {{count($image->comments)}} comentarios </a>

{{--                Formulario de un input para los LIKES--}}
                <p>
{{--                <form action="{{ route('like') }}" method="post" style="display: none" id="form_like">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <input type="hidden" id="like" name="image_id" value="{{$image->id}}">--}}
{{--                </form>--}}
{{--                <img id="img_heart" class="w-8" src="{{asset('images/heart.svg')}}" alt="heart">--}}
                    <a id="heart" href="{{ route('like', ['id'=>$image->id]) }}">
                        <svg id="img_heart" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12.62 20.8101C12.28 20.9301 11.72 20.9301 11.38 20.8101C8.48 19.8201 2 15.6901 2 8.6901C2 5.6001 4.49 3.1001 7.56 3.1001C9.38 3.1001 10.99 3.9801 12 5.3401C13.01 3.9801 14.63 3.1001 16.44 3.1001C19.51 3.1001 22 5.6001 22 8.6901C22 15.6901 15.52 19.8201 12.62 20.8101Z"
                                      stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <img id="img_heart" class="w-8" src="http://www.w3.org/2000/svg" alt="">
                    </a>
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
        {{--const heart = document.getElementById('img_heart');--}}
        {{--heart.addEventListener('click', (e) =>{--}}
        {{--    e.preventDefault()--}}
        {{--    fetch({{ route('like')}}).then( data =>{--}}
        {{--        if(data.succes){--}}
        {{--            // var img_heart = document.getElementById('img_heart');--}}
        {{--            heart.style.fill = 'red';--}}
        {{--        }--}}
        {{--    })--}}
        {{--        .catch(error =>{--}}
        {{--            console.log(error)--}}
        {{--        })--}}
        {{--});--}}


         $('#img_heart').click(function(){
             var img_heart = document.getElementById('img_heart');
             img_heart.style.fill = 'red';

            {{--$.ajax({--}}
            {{--    url: '{{ route('like') }}',--}}
            {{--    type: 'POST',--}}
            {{--    data:'user_id={{\Illuminate\Support\Facades\Auth::id()}}&id={{$image->id}}' ,--}}
            {{--    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',--}}
            {{--    dataType: 'text',--}}
            {{--    succes: function(data){--}}
            {{--        if(data.succes){--}}
            {{--            var img_heart = document.getElementById('img_heart');--}}
            {{--            img_heart.style.background = 'red';--}}
            {{--        }--}}
            {{--    },--}}
            {{--    fail: function(){--}}
            {{--        alert('Tu petición no se ha podido realizar');--}}
            {{--    },--}}
            {{--    });--}}
        });

    </script>


</x-app-layout>
