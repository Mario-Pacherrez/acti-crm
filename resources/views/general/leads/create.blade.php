<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Clientes Potenciales') }}
        </h2>
    </x-slot>--}}

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-10 md:px-20 lg:px-20">
            <h2 class="mt-1 mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Crea tu Leads') }}
            </h2>
            <div class="block mb-8">
                <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('leads.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="channels" class="block font-medium text-sm text-gray-700">Medios</label>
                            <select name="channels" id="channels" class="form-select block rounded-md shadow-sm mt-1 block w-full" required>
                                @foreach($channels as $id => $channel)
                                    <option value="{{ $id }}" {{ in_array($id, old('channels', [])) ? ' selected' : '' }}>{{ $channel }}</option>
                                @endforeach
                            </select>
                            @error('channels')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{--<div class="px-4 py-5 bg-white sm:p-6 hidden">
                            <label for="users" class="block font-medium text-sm text-gray-700">Asesor</label>
                            <select name="users" id="users" class="form-select block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($users as $user)
                                    @if($user->id == '2')
                                        <option value="{{ $user->id }}">{{ $user->name." ".$user->lastname }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('users')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>--}}

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="names" class="block font-medium text-sm text-gray-700">Nombres y Apellidos del Leads</label>
                            <input type="text" name="names" id="names" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('names', '') }}" required/>
                            @error('names')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', '') }}"/>
                            @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="phone" class="block font-medium text-sm text-gray-700">Teléfono/Celular</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('phone', '') }}"/>
                            @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="courses_name" class="block font-medium text-sm text-gray-700">Nombre del Curso(s)</label>
                            <input type="text" name="courses_name" id="courses_name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('courses_name', '') }}" required/>
                            @error('courses_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Crear
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>