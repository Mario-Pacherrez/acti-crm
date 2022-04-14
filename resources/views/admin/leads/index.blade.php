<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes Potenciales') }}
        </h2>
    </x-slot>--}}

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Administrar Leads') }}
        </h2>

        <div class="block mb-8">
            <a href="{{ route('admin.leads.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Leads</a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-1 py-3 border-r text-center">
                                N°
                            </th>
                            <th class="px-4 py-3">
                                Fecha Registro
                            </th>
                            <th class="px-4 py-3">
                                Nombres y Apellidos
                            </th>
                            {{--<th class="px-4 py-3">
                                Email
                            </th>--}}
                            {{--<th class="px-4 py-3">
                                Teléfono
                            </th>--}}
                            <th class="px-4 py-3 border-r">
                                Curso(s)
                            </th>
                            {{--<th class="px-4 py-3">
                                Medio
                            </th>--}}
                            <th class="px-3 py-3 border-r text-center">
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
                            <td class="px-1 py-3 text-sm border-r text-center"></td>

                            <td class="px-4 py-3 text-sm">{{ $lead->created_at->format('d-m-Y') }}</td>

                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 font-semibold leading-tight text-gray-700 dark:text-gray-400">
                                    {{ $lead->names }}
                                </span>
                            </td>

                            {{--<td class="px-4 py-3 text-sm">{{ $lead->email }}</td>--}}

                            {{--<td class="px-4 py-3 text-sm">{{ $lead->phone }}</td>--}}

                            <td class="px-4 py-3 text-sm border-r">{{ $lead->courses_name }}</td>

                            {{--<td class="px-4 py-3 text-sm">{{ $lead->channel->channel_name }}</td>--}}

                            @foreach ($lead->users as $user)
                                @if($user->id == '2')
                                    <td class="px-3 py-3 text-sm text-amber-500 font-semibold border-r">{{ $user->name." ".$user->lastname }}</td>
                                @else
                                    <td class="px-3 py-3 text-sm text-emerald-500 font-semibold border-r">{{ $user->name." ".$user->lastname }}</td>
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
            </div>

            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3"></span>
            </div>
        </div>
    </div>
</x-app-layout>