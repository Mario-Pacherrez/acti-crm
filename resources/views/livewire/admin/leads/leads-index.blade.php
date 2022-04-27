<div>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Administrar Leads') }}
        </h2>

        <div class="block mb-8">
            <a href="{{ route('admin.leads.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Leads</a>
        </div>

        <div>
            <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <div class="w-7">
                    <label for="adviser" class="block font-medium text-sm text-gray-700">Asesor:</label>
                    <select name="adviser" id="adviser" class="form-select block rounded-md shadow-sm mt-1 block" wire:model="byAdviser">
                        <option value="0">Sin seleccionar.</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name." ".$user->lastname }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Search input -->
                {{--<div class="flex flex-1 lg:mr-32 h-11">
                    <div class="relative w-full max-w-md mr-6 focus-within:text-purple-500">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4"
                                 aria-hidden="true"
                                 fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model="search"
                               class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-white border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                               type="text"
                               placeholder="Buscar"
                               aria-label="Search"/>
                    </div>
                </div>--}}

            </div>

            <div class="mb-5">
                <input type="text" id="start" wire:model.lazy="date_start" autocomplete="off" placeholder="Fecha Inicio">
                <input type="text" id="end" wire:model.lazy="date_end" autocomplete="off" placeholder="Fecha Fin">
            </div>

            {{--<div date-rangepicker class="flex items-center mb-5">
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input wire:model.lazy="datestart" id="date_start"
                           name="date_start"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">a</span>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input wire:model="dateend" id="date_end"
                           name="date_end"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                </div>
            </div>--}}
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
                            <th class="px-4 py-3">
                                Fecha Registro
                            </th>
                            <th class="px-2 py-3">
                                Nombres y Apellidos
                            </th>
                            {{--<th class="px-4 py-3">
                                Email
                            </th>--}}
                            {{--<th class="px-4 py-3">
                                Teléfono
                            </th>--}}
                            <th class="px-2 py-3 border-r">
                                Curso(s)
                            </th>
                            {{--<th class="px-4 py-3">
                                Medio
                            </th>--}}
                            <th class="px-1 py-3 border-r text-center">
                                Asesor
                            </th>
                            <th class="px-1 py-3 text-center">
                                Acción
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($leads as $lead)
                            <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                                <td class="px-1 py-3 text-sm border-r text-center">{{ ($leads->currentPage() - 1) * $leads->perPage() + $loop->iteration }}</td>

                                <td class="px-4 py-3 text-sm">{{ $lead->created_at->format('d/m/Y') }}</td>

                                <td class="px-2 py-3 text-sm">
                                <span class="py-1 font-semibold leading-tight text-gray-700 dark:text-gray-400">
                                    {{ $lead->names }}
                                </span>
                                </td>

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->email }}</td>--}}

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->phone }}</td>--}}

                                <td class="px-2 py-3 text-sm border-r">{{ $lead->courses_name }}</td>

                                {{--<td class="px-4 py-3 text-sm">{{ $lead->channel->channel_name }}</td>--}}

                                @foreach ($lead->users as $user)
                                    @if($user->id == '2')
                                        <td class="px-1 py-3 text-sm text-amber-500 font-semibold border-r text-center">{{ $user->name." ".$user->lastname }}</td>
                                    @else
                                        <td class="px-1 py-3 text-sm text-emerald-500 font-semibold border-r text-center">{{ $user->name." ".$user->lastname }}</td>
                                    @endif
                                @endforeach

                                <td class="px-1 py-3">
                                    <div class="flex items-center space-x-4 text-sm justify-center">
                                        <a href="{{ route('admin.leads.show', $lead->id_client_lead) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Ver" title="Ver">
                                            <svg class="w-5 h-5"
                                                 aria-hidden="true"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.leads.edit', $lead->id_client_lead) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Editar" title="Editar">
                                            <svg class="w-5 h-5"
                                                 aria-hidden="true"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                        <form class="inline-block" action="{{ route('admin.leads.destroy', $lead->id_client_lead) }}" method="POST" onsubmit="return confirm('¿Está seguro que quiere eliminarlo?');">
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
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3">
                            {{ "Total de Resultados: ".$leads->total() }}
                        </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                {{ $leads->links() }}
                                {{--{{ $leads->links('vendor.pagination.default') }}--}}
                                {{--<ul class="inline-flex items-center"></ul>--}}
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
