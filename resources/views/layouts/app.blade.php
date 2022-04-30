<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ACTI | @yield('title', 'Inicio')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset("css/tailwind.output.css") }}">

        <link rel="stylesheet" href="{{ asset("css/acti.css") }}">

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        {{--<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.2/dist/flowbite.min.css" />--}}

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

        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script>
            /*Para  panel de leads */
            var picker = new Pikaday({
                field: document.getElementById('start'),
                onSelect: function() {
                    picker2.setMinDate(this.getDate());
                },
                format: 'D/M/YYYY',
                toString(start, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = start.getDate();
                    const month = start.getMonth() + 1;
                    const year = start.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            var picker2 = new Pikaday({
                field: document.getElementById('end'),
                onSelect: function() {
                    picker.setMaxDate(this.getDate());
                },
                format: 'D/M/YYYY',
                toString(end, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = end.getDate();
                    const month = end.getMonth() + 1;
                    const year = end.getFullYear();
                    return `${year}-${month}-${day}`;
                }
            });

            /* Para panel de ventas */
            var picker3 = new Pikaday({
                field: document.getElementById('start_sales'),
                format: 'dd/mm/YYYY',
                toString(start_sales, format) {
                    const day = start_sales.getDate();
                    const month = start_sales.getMonth() + 1;
                    const year = start_sales.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            var picker4 = new Pikaday({
                field: document.getElementById('end_sales'),
                format: 'dd/mm/YYYY',
                toString(end_sales, format) {
                    const day = end_sales.getDate();
                    const month = end_sales.getMonth() + 1;
                    const year = end_sales.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            /* Para Mis Leads */
            var start_my_leads = new Pikaday({
                field: document.getElementById('start_my_leads'),
                /*onSelect: function() {
                    end_my_leads.setMinDate(this.getDate());
                },*/
                format: 'D/M/YYYY',
                toString(start_my_leads, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = start_my_leads.getDate();
                    const month = start_my_leads.getMonth() + 1;
                    const year = start_my_leads.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            var end_my_leads = new Pikaday({
                field: document.getElementById('end_my_leads'),
                /*onSelect: function() {
                    start_my_leads.setMaxDate(this.getDate());
                },*/
                format: 'D/M/YYYY',
                toString(end_my_leads, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = end_my_leads.getDate();
                    const month = end_my_leads.getMonth() + 1;
                    const year = end_my_leads.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            /* Para Reportes */
            var date_start_of_report_1 = new Pikaday({
                field: document.getElementById('date_start_of_report_1'),
                /*onSelect: function() {
                    end_my_leads.setMinDate(this.getDate());
                },*/
                format: 'D/M/YYYY',
                toString(date_start_of_report_1, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = date_start_of_report_1.getDate();
                    const month = date_start_of_report_1.getMonth() + 1;
                    const year = date_start_of_report_1.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });

            var date_end_of_report_1 = new Pikaday({
                field: document.getElementById('date_end_of_report_1'),
                /*onSelect: function() {
                    end_my_leads.setMinDate(this.getDate());
                },*/
                format: 'D/M/YYYY',
                toString(date_end_of_report_1, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = date_end_of_report_1.getDate();
                    const month = date_end_of_report_1.getMonth() + 1;
                    const year = date_end_of_report_1.getFullYear();
                    return `${year}-${month}-${day}`;
                },
            });
        </script>

        {{--<script src="https://unpkg.com/flowbite@1.4.2/dist/datepicker.js"></script>--}}
    </body>
</html>