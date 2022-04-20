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
        </ul>
    </div>
</aside>