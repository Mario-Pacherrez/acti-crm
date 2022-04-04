<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes Potenciales') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8 w-full">
            <div class="block mb-8">
                <a href="{{ route('leads.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Leads</a>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                            Nombres y Apellidos
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                            Teléfono
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                            Nombre de curso(s)
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                            Fecha de Creación
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                            Acción
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($leads as $lead)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                                {{ $lead->names }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                                {{ $lead->email }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                                {{ $lead->phone }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                                {{ $lead->courses_name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                                {{ $lead->created_at }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('leads.show', $lead->id_client_lead) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Ver</a>
                                                <a href="{{ route('leads.edit', $lead->id_client_lead) }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                                                <form class="inline-block" action="{{ route('leads.destroy', $lead->id_client_lead) }}" method="POST" onsubmit="return confirm('¿Está seguro?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>