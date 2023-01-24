<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sube Imágenes') }}
        </h2>
    </x-slot>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('save_images') }}" method="post" class="">
            <div class="px-4 py-5 bg-gray-500 sm:p-6 shadow">
                <div>
                    <x-jet-label>{{__('Sube tu foto favorita')}}</x-jet-label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div>
                    <x-jet-label>{{__('Descripción')}}</x-jet-label>
                    <input class="form-control" type="text" id="formFile">
                </div>
                <div>
                    <x-jet-button>{{__('Envía')}}</x-jet-button>
                </div>
            </div>

        </form>
    </div>
</x-app-layout>
