<x-app-layout>
    @section('title', 'Detalles del Leads')

    {{--@livewire('general.my-leads.details-index')--}}

    <div>
        {{--{{ dd($id_client_lead) }}--}}
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Detalles del Leads') }}
            </h2>

            <div class="block mb-8">
                <a href="{{ route('myleads.details.create', $id_client_lead) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Registrar Detalle</a>
            </div>

            {{--<div class="block mb-8">
                @livewire('general.my-leads.details-create', ['id_client_lead' => $id_client_lead])
            </div>--}}
            {{--@livewire('general.my-leads.details-show', ['lead' => $lead], key($lead->id_client_lead))--}}

            <div class="block mb-8">
                <a href="{{ route('myleads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
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
                                        <td class="px-4 py-3 text-sm">{{ $detail->created_at->format('d/m/Y') }}</td>
                                    @endif

                                    {{--@if(is_null($detail->updated_at))
                                        <td class="px-4 py-3 text-sm">{{ "-" }}</td>
                                    @else
                                        <td class="px-4 py-3 text-sm">{{ $detail->updated_at->format('d/m/Y') }}</td>
                                    @endif--}}

                                    <td class="px-2 py-3 text-sm">{{ $detail->title }}</td>

                                    <td class="px-2 py-3 text-sm">{{ $detail->description }}</td>

                                   {{-- <td class="px-1 py-3">
                                        <a href="{{ route('myleads.details.edit', $detail->id_lead_detail) }}"
                                           class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                           aria-label="Editar"
                                           title="Editar">
                                            <svg class="w-5 h-5"
                                                 aria-hidden="true"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                    </td>--}}

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