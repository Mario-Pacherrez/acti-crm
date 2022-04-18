<x-app-layout>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <h2 class="mt-1 mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Editar Mi Leads') }}
            </h2>

            <div class="block mb-8">
                <a href="{{ route('sales.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('sales.update', $sale->id_client_lead) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-3 bg-white sm:p-6">
                            <label for="status" class="block font-medium text-sm text-gray-700">Estado</label>
                            <select name="status" id="status" class="form-select block rounded-md shadow-sm mt-1 block w-full" required="required">
                                @foreach($leadStatus as $ls)
                                    <option value="{{ $ls->id_lead_status }}" @if (old('status', $sale->leadStatus->id_lead_status) === $ls->id_lead_status) selected @endif>
                                        {{ $ls->status_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
