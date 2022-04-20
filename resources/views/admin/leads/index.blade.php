<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes Potenciales') }}
        </h2>
    </x-slot>--}}
    @section('title', 'Panel de Leads')

    @livewire('admin.leads.leads-index')
</x-app-layout>