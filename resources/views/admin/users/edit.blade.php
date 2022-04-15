<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Volver a la lista</a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="user_type" class="block font-medium text-sm text-gray-700">Tipo de Usuario</label>
                            <input type="text" name="user_type" id="user_type" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('user_type', $user->user_type) }}" />
                            @error('user_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nickname" class="block font-medium text-sm text-gray-700">Nickname</label>
                            <input type="text" name="nickname" id="nickname" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('nickname', $user->nickname) }}" />
                            @error('nickname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nombres</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="lastname" class="block font-medium text-sm text-gray-700">Apellidos</label>
                            <input type="text" name="lastname" id="lastname" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('lastname', $user->lastname) }}" />
                            @error('lastname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                            @foreach($roles as $role)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" id="roles" class="form-checkbox" value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? ' checked' : '' }}>
                                        <span class="ml-2"><p class="capitalize">{{ $role->name }}</p></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar Usuario
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>