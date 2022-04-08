<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8 w-full">
            <div class="block mb-8">
                <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Usuario</a>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    {{--<th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm text-center">
                                        N°
                                    </th>--}}
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm text-center">
                                        Roles
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                        Nombre de Usuario
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                        Nombres
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 text-left border-r text-sm">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                        Acción
                                    </th>
                                </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        {{--<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r"></td>--}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                            @foreach ($user->roles as $role)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 mb-2">
                                                    {{ $role->name }}
                                                </span><br>
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                            {{ $user->nickname }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                            {{ $user->lastname }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Ver</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                                            <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded cursor-pointer" value="Eliminar">
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