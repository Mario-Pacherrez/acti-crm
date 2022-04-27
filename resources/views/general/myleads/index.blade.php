<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes Potenciales') }}
        </h2>
    </x-slot>--}}

    @section('title', 'Panel de Mis Leads')

    @livewire('general.my-leads.my-leads-index')
</x-app-layout>