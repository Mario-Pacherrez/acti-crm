<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar Cliente Potencial') }}
        </h2>
    </x-slot>--}}

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-5 w-2/3">
            <h2 class="mt-1 mb-8 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Información del Leads') }}
            </h2>
            <div class="block mb-8">
                <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-4">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                {{--<tr class="border-b">
                                    <th scope="col" class="w-1/4 px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->id_client_lead }}
                                    </td>
                                </tr>--}}
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha y Hora de Registro
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->created_at->format('d/m/Y')." - ".$lead->created_at->format('H:i') }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha y Hora de Modificación
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->updated_at->format('d/m/Y')." - ".$lead->updated_at->format('H:i') }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombres y Apellidos del Leads
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->names }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->email }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Teléfono/Celular
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->phone }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre de Curso(s)
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->courses_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" class="pl-6 pr-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Medio
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $lead->channel->channel_name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block mt-8">
                {{--<a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>--}}
            </div>
        </div>
    </div>
</x-app-layout>