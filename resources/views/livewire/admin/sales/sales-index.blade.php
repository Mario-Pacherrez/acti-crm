<div>
    <div class="w-full grid px-6 mx-auto sm:px-6 lg:px-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Panel de Ventas') }}
        </h2>

        {{--<div class="block mb-8">
            <a href="{{ route('admin.leads.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Leads</a>
        </div>--}}
        <div>
            <div class="flex flex-row flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div>
                    <label for="adviser" class="block font-medium text-sm text-gray-700">Asesor:</label>
                    <select name="adviser" id="adviser" class="form-select block rounded-md shadow-sm mt-1 block" wire:model="byAdviserInSales">
                        <option value="0">Sin seleccionar.</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name." ".$user->lastname }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block font-medium text-sm text-gray-700">Estado:</label>
                    <select name="status" id="status" class="form-select block rounded-md shadow-sm mt-1 block" wire:model="byStatusInSales">
                        <option value="0">Sin seleccionar.</option>
                        @foreach($status as $st)
                            <option value="{{ $st->id_lead_status }}">{{ $st->status_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-5">
                <input type="text" id="start_sales" wire:model.lazy="date_start_sales" autocomplete="off" placeholder="Fecha Inicio">
                <input type="text" id="end_sales" wire:model.lazy="date_end_sales" autocomplete="off" placeholder="Fecha Fin">
            </div>

        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                @if($leads->count())
                    <table class="w-full">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-1 py-3 border-r text-center">
                                N°
                            </th>
                            <th class="px-1 py-3">
                                Fecha Registro
                            </th>
                            <th class="px-1 py-3">
                                Estado
                            </th>
                            <th class="px-1 py-3">
                                Medio
                            </th>
                            <th class="px-1 py-3">
                                Nombres y Apellidos
                            </th>
                            {{--<th class="px-4 py-3">
                                Email
                            </th>--}}
                            {{--<th class="px-4 py-3">
                                Teléfono
                            </th>--}}
                            <th class="px-1 py-3 border-r">
                                Curso(s)
                            </th>
                            {{--<th class="px-4 py-3">
                                Medio
                            </th>--}}
                            <th class="px-1 py-3 text-center">
                                Asesor
                            </th>
                            <th class="px-1 py-3 border-r text-center">
                                Fecha de Asignación
                            </th>
                            <th class="px-1 py-3 text-center">
                                Acción
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($leads as $lead)
                            <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                                <td class="pl-2 py-3 text-sm border-r text-center">{{ ($leads->currentPage() - 1) * $leads->perPage() + $loop->iteration }}</td>

                                <td class="px-1 py-3 text-sm">{{ $lead->created_at->format('d/m/Y') }}</td>

                                <td class="px-1 py-3 text-sm capitalize">
                                    @if($lead->leadStatus->id_lead_status == '1')
                                        <span class="px-1 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        {{ $lead->leadStatus->status_name }}
                                    </span>
                                    @else
                                        <span class="px-1 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        {{ $lead->leadStatus->status_name }}
                                    </span>
                                    @endif
                                </td>

                                <td class="px-1 py-3 text-sm">
                                    {{ $lead->channel->channel_name }}
                                </td>

                                <td class="px-1 py-3 text-sm">
                                <span class="px-1 py-1 font-semibold leading-tight text-gray-700 dark:text-gray-100">
                                    {{ $lead->names }}
                                </span>
                                </td>

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->email }}</td>--}}

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->phone }}</td>--}}

                                <td class="px-1 py-3 text-sm border-r">{{ $lead->courses_name }}</td>

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->channel->channel_name }}</td>--}}

                                @foreach ($lead->users as $user)
                                    <td class="px-1 py-3 text-sm text-center">{{ $user->name." ".$user->lastname }}</td>
                                @endforeach

                                @foreach ($lead->users as $user)
                                    <td class="px-1 py-3 text-sm border-r text-center">{{ $user->pivot->updated_at->format('d/m/Y') }}</td>
                                @endforeach

                                <td class="px-1 py-3">
                                    <div class="flex items-center space-x-4 text-sm justify-center">
                                        <a href="{{ route('admin.sales.show', $lead->id_client_lead) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Ver" title="Ver">
                                            <svg class="w-5 h-5"
                                                 aria-hidden="true"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.sales.edit', $lead->id_client_lead) }}"
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

                                        {{--<form class="inline-block" action="{{ route('sales.destroy', $lead->id_client_lead) }}" method="POST" onsubmit="return confirm('¿Está seguro que quiere eliminarlo?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Eliminar" title="Eliminar">
                                                <svg class="w-5 h-5"
                                                     aria-hidden="true"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>--}}

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3">{{ "Total de Resultados: ".$leads->total() }}</span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                {{ $leads->links() }}
                            </nav>
                        </span>
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay registros de la búsqueda.
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
