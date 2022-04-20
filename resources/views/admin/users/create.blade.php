<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-10 md:px-20 lg:px-20">
            <div class="block mb-8">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        {{-- Tipo de Usuario --}}

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nickname" class="block font-medium text-sm text-gray-700">Nombre de Usuario</label>
                            <input type="text" name="nickname" id="nickname" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('nickname', '') }}" />
                            @error('nickname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nombres</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', '') }}" required/>
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="lastname" class="block font-medium text-sm text-gray-700">Apellidos</label>
                            <input type="text" name="lastname" id="lastname" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('lastname', '') }}" required/>
                            @error('lastname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', '') }}" required/>
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" required/>
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                            @foreach($roles as $id => $role)
                                <div>
                                    <label class="inline-flex items-center">
                                        {{--<input type="checkbox" name="roles[]" id="roles" class="form-checkbox" value="{{ $role->id }}" >--}}
                                        <input type="checkbox" name="roles[]" id="roles" class="form-checkbox" value="{{ $id }}" {{ in_array($id, old('roles', [])) ? ' checked' : '' }}>
                                        <span class="ml-2"><p class="capitalize">{{ $role }}</p></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Crear Usuario
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>