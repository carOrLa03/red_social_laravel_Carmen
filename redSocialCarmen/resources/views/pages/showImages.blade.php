<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comentarios de la Imagen') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-label>{{$image->user->name}} : {{$image->description}}</x-jet-label>
            <img src="{{asset('img_red/'.$image->image_path)}}" alt="imagen">
        </div>

        <div class="comentarios py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach($comments as $comment)
                    <div class="">
                        <x-jet-label>{{$comment->user->name}} {{$now->sub($image->created_at)->longAbsoluteDiffForHumans()}} </x-jet-label>
                         <p>{{$comment->content}}</p>
                    </div>
                <div>
                    <form method="post" action="{{route('destroy', ['id'=>$comment->id])}}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-pink-800 focus:text-red-600">Eliminar</button>
                    </form>
                </div>
                @endforeach
            <p></p>
            </div>
        </div>
    </section>

</x-app-layout>

