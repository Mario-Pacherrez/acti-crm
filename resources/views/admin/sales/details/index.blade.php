<x-app-layout>
    @section('title', 'Detalles del Leads')

    <div>
        <div class="w-full grid px-6 mx-auto sm:px-6 lg:px-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Detalles del Leads') }}
            </h2>

            <div class="flex flex-row items-center mb-6">
                <div>
                    <a href="{{ route('admin.sales.index') }}" class="flex items-center bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">
                        <svg class="w-4 h-4"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>&nbsp;Volver al Panel de Ventas
                    </a>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if($details->count())
                        <table class="w-full">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-1 py-3 border-r text-center">
                                        N°
                                    </th>
                                    <th class="px-4 py-3">
                                        Fecha de Registro
                                    </th>
                                    {{--<th class="px-4 py-3">
                                        Fecha de Actualización
                                    </th>--}}
                                    <th class="px-4 py-3">
                                        Título
                                    </th>
                                    <th class="px-4 py-3">
                                        Descripción
                                    </th>
                                    {{--<th class="px-4 py-3">
                                        Acción
                                    </th>--}}
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($details as $detail)
                                <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                                    <td class="px-1 py-3 text-sm border-r text-center">{{ ($details->currentPage() - 1) * $details->perPage() + $loop->iteration }}</td>

                                    @if(is_null($detail->created_at))
                                        <td class="px-4 py-3 text-sm">{{ "-" }}</td>
                                    @else
                                        <td class="px-4 py-3 text-sm">{{ $detail->created_at->format('d/m/Y')." - ".$detail->created_at->format('H:i:s') }}</td>
                                    @endif

                                    {{--@if(is_null($detail->updated_at))
                                        <td class="px-4 py-3 text-sm">{{ "-" }}</td>
                                    @else
                                        <td class="px-4 py-3 text-sm">{{ $detail->updated_at->format('d/m/Y') }}</td>
                                    @endif--}}

                                    <td class="px-2 py-3 text-sm">{{ $detail->title }}</td>

                                    <td class="px-2 py-3 text-sm">{{ $detail->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            No hay detalles registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>