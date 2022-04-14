<x-app-layout>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('PANEL VENDEDOR') }}
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                N°
                            </th>
                            <th class="px-4 py-3">
                                Estado
                            </th>
                            <th class="px-4 py-3">
                                Medio
                            </th>
                            <th class="px-4 py-3">
                                Fecha Registro
                            </th>
                            <th class="px-4 py-3">
                                Fecha Asignado
                            </th>
                            <th class="px-4 py-3">
                                Nombres y Apellidos
                            </th>
                            <th class="px-4 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3 bg-indigo-200 border-r text-sm">
                                Curso(s)
                            </th>
                            <th class="px-4 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>