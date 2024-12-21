<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="no-js" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{asset('admin/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
        <link rel="stylesheet" href="{{asset('admin/assets/css/custom.css')}}">
        <script>
            (function() {
                var currentTheme = localStorage.getItem('theme');
                if (currentTheme) {
                    document.documentElement.setAttribute('data-theme', currentTheme);
                }
            })();
        </script>
        {{-- <script src="theme-handler.js" defer></script> --}}
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <!-- Jquery Core Js -->
        <script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script>

        <!-- Plugin Js-->
        {{-- <script src="{{asset('admin/assets/bundles/apexcharts.bundle.js')}}"></script> --}}

        <!-- Jquery Page Js -->
        <script src="{{asset('admin/js/template.js')}}"></script>
        <script src="{{asset('admin/js/page/hr.j')}}s"></script>
    </body>
</html>
