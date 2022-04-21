<div>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Detalles del Leads') }}
        </h2>

        <div class="block mb-8">
            <a href="{{ route('myleads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-1 py-3 border-r text-center">
                            N°
                        </th>
                        <th class="px-4 py-3">
                            Fecha de Registro
                        </th>
                        <th class="px-4 py-3">
                            Fecha de Actualización
                        </th>
                        <th class="px-4 py-3">
                            Título
                        </th>
                        <th class="px-4 py-3">
                            Descripción
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                        @foreach ($details as $detail)
                            <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                                <td class="px-1 py-3 text-sm border-r text-center"></td>

                                @if(is_null($detail->created_at))
                                    <td class="px-4 py-3 text-sm">{{ "-" }}</td>
                                @else
                                    <td class="px-4 py-3 text-sm">{{ $detail->created_at->format('d/m/Y') }}</td>
                                @endif

                                @if(is_null($detail->updated_at))
                                    <td class="px-4 py-3 text-sm">{{ "-" }}</td>
                                @else
                                    <td class="px-4 py-3 text-sm">{{ $detail->updated_at->format('d/m/Y') }}</td>
                                @endif

                                <td class="px-2 py-3 text-sm">{{ $detail->title }}</td>

                                <td class="px-2 py-3 text-sm">{{ $detail->description }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--<x-jet-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            <h4 class="font-semibold">Crear Detalles del Leads</h4>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título del detalle:"/>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del detalle:"/>
                <textarea rows="6" class="form-control w-full" wire:model.defer="description"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="save">
                Registrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>--}}
</div>
