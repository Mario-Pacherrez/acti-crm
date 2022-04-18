<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Inicio')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset("css/tailwind.output.css") }}">

        <link rel="stylesheet" href="{{ asset("css/acti.css") }}">

        @livewireStyles

        <!-- Scripts -->
        {{--<script src="{{ asset("/js/alpine.min.js") }}" defer></script>--}}

        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="{{ asset('js/init-alpine.js') }}"></script>
    </head>

    <body class="font-sans antialiased">
        {{--<x-jet-banner />--}}

        <div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{--<div class="flex-col w-full md:flex md:flex-row md:min-h-screen">--}}
            <!-- Desktop sidebar -->
            @include('frontend.includes.sidebar')

            <!-- Mobile sidebar -->
            @include('frontend.includes.mobile-sidebar')


            <!-- Header -->
            <div class="flex flex-col flex-1 w-full">
                @livewire('navigation-menu')
                {{--@include('frontend.includes.header')--}}

                <!-- Page Content -->
                <main class="h-full pb-16 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        {{--<script type="text/javascript">
            $(document).ready(function () {
                $('.openModal').on('click', function(e){
                    $('#interestModal').removeClass('invisible');
                });
                $('.closeModal').on('click', function(e){
                    $('#interestModal').addClass('invisible');
                });
            });
        </script>--}}
    </body>
</html>