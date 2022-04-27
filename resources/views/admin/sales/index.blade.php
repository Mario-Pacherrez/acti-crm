<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes Potenciales') }}
        </h2>
    </x-slot>--}}
    @section('title', 'Panel de Ventas')

    @livewire('admin.sales.sales-index')
</x-app-layout>