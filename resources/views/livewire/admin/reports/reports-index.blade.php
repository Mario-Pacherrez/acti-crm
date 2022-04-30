<div>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Panel de Reportes') }}
        </h2>

        <div>
            <div class="flex flex-row justify-start items-center mb-6">
                <div class="mr-5">
                    <input type="text" id="date_start_of_report_1" wire:model.lazy="date_start_of_report_1" autocomplete="off" placeholder="Fecha Inicio">
                </div>
                <div>
                    <input type="text" id="date_end_of_report_1" wire:model.lazy="date_end_of_report_1" autocomplete="off" placeholder="Fecha Fin">
                </div>
            </div>
        </div>

        <div class="flex justify-start">
            <div>
                <div class="container flex justify-center mx-auto">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <h3 class="text-base text-center font-semibold px-2 py-2">
                                Cantidad de Leads asignado por Asesor
                            </h3>
                            <div class="border-b border-gray-200 shadow">
                                <table class="divide-y divide-gray-300 ">
                                    <thead class="bg-gray-50">
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-2 py-2 text-xs text-gray-500 border-r text-center">
                                            N°
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500 border-r">
                                            Asesor
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Cantidad Leads
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300 dark:bg-gray-800">
                                    @php
                                        $total1 = 0; $total2 = 0;
                                    @endphp

                                    @foreach ($users as $user)
                                        <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                                            <td class="px-2 py-4 text-sm border-r text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 text-sm border-r">
                                                <div class="text-sm">
                                                    {{ $user->name." ".$user->lastname }}
                                                    {{--{{ $user }}--}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                @if($r == 1)
                                                    {{ $user->user_count }}
                                                @else
                                                    {{ $user->clientsLeads->count() }}
                                                @endif
                                            </td>
                                        </tr>

                                        @php
                                            $total1 += $user->clientsLeads->count(); $total2 += $user->user_count;
                                        @endphp

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="grid px-4 py-3 font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                                    <span class="flex items-center col-span-3">
                                        {{ "Total : " }}
                                    </span>
                                    <span class="col-span-2"></span>
                                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end mr-2">
                                        @if($total1)
                                            {{ $total1 }}
                                        @else
                                            {{ $total2 }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div></div>
        </div>

        {{--<div class="w-1/2 overflow-hidden rounded-lg shadow-xs">
            <div class="w-1/2 overflow-x-auto">

            </div>
        </div>--}}


    </div>
</div>
