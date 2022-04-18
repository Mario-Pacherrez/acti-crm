<aside class="z-20 hidden w-56 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <div class="text-center">
            <a class="text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('dashboard') }}">
                ACTI
            </a>
        </div>

        <ul class="mt-10">
            @can('admin.home')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('dashboard'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('dashboard') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4 text-base">Inicio</span>
                    </a>
                </li>
            @endcan

            {{--@can('home')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('home'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('home') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4 text-base">Inicio</span>
                    </a>
                </li>
            @endcan--}}

        </ul>
        <ul>
            @can('admin.users.index')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.users.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('admin.users.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ml-4 text-base">Usuarios</span>
                    </a>
                </li>
            @endcan

                <li class="relative px-6 py-3">
                    @if (request()->routeIs('leads.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('leads.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="ml-4 text-base">Leads</span>
                    </a>
                </li>

                @can('admin.leads.index')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.leads.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('admin.leads.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ml-4 text-base">Panel de Leads</span>
                    </a>
                </li>
                @endcan

                @can('admin.sales.index')
                <li class="relative px-6 py-3">
                    @if(request()->routeIs('admin.sales.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('admin.sales.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4 text-base">Panel de Ventas</span>
                    </a>
                </li>
                @endcan

                <li class="relative px-6 py-3">
                    @if(request()->routeIs('myleads.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('myleads.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                        </svg>
                        <span class="ml-4 text-base">Mis Leads</span>
                    </a>
                </li>

            {{--@can('admin.leads.index')
                <li class="relative px-6 py-3">
                    @if (request()->routeIs('admin.leads.*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('admin.leads.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="ml-4 text-base">Leads</span>
                    </a>
                </li>
            @endcan--}}

                {{--<li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                       href="{{ route('sales.index') }}">
                        <svg class="w-5 h-5"
                             aria-hidden="true"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path>
                        </svg>
                        <span class="ml-4 text-base">Mis Leads</span>
                    </a>
                </li>--}}

            {{--<li class="relative px-6 py-3">
                @if (request()->routeIs('leads.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <button class="inline-flex items-center justify-between w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenu"
                    aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5"
                         aria-hidden="true"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="ml-4 text-base">Clientes</span>
                </span>
                    <svg class="w-4 h-4"
                         aria-hidden="true"
                         fill="currentColor"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul
                        x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">Mis Clientes</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('leads.index') }}">Potenciales (Leads)</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">Gestionar</a>
                        </li>
                    </ul>
                </template>
            </li>--}}

            {{--<li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                   href="#">
                    <svg class="w-5 h-5"
                         aria-hidden="true"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                    </svg>
                    <span class="ml-4 text-base">Canales</span>
                </a>
            </li>--}}

            {{--<li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                   href="#">
                    <svg class="w-5 h-5"
                         aria-hidden="true"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="ml-4 text-base">Estado</span>
                </a>
            </li>--}}

            {{--<li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                   href="#">
                    <svg class="w-5 h-5"
                         aria-hidden="true"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                    </svg>
                    <span class="ml-4 text-base">Roles</span>
                </a>
            </li>--}}

            {{--<li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-base font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                   href="#">
                    <svg class="w-5 h-5"
                         aria-hidden="true"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                    </svg>
                    <span class="ml-4 text-base">Permisos</span>
                </a>
            </li>--}}

        </ul>
    </div>
</aside>