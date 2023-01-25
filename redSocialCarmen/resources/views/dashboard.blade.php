@extends('layouts.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Red social') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($images as $image)
                {{$image->user->name . ' '. $image->user->surname}}
                {{$image->description}} <br>
                <img src="{{asset('img_red/'.$image->image_path)}}">
{{--      Diferencia entre la fecha actual y la subida a la red social      --}}
                <p>Hace {{$now->sub($image->created_at)->longAbsoluteDiffForHumans()}}</p>
            @endforeach

        </div>
        <div>{{$images->links()}}</div>
    </div>

</x-app-layout>
@section('footer')
    @parent
@endsection
