<x-app-layout>
    <div>
        <div class="max-w-4xl mx-auto pt-5 pb-10 sm:px-10 md:px-20 lg:px-20">
            <h2 class="mt-1 mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Registrar Detalle') }}
            </h2>

            <div class="mb-8">
                <a href="{{ route('myleads.details.show', $id_client_lead) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la Lista de Detalles</a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('myleads.details.store', $id_client_lead) }}">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-6 py-3 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Título:</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('title', '') }}" required/>
                            @error('title')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-6 py-3 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Descripción:</label>
                            <input type="text" name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('description', '') }}" required/>
                            @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>