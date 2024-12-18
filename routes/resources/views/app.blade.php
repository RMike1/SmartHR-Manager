<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="preset-1" data-pc-sidebar-caption="true"
    data-pc-layout="vertical" data-pc-direction="ltr" dir="ltr" data-pc-theme_contrast="false" data-pc-theme="dark">

<head>
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="lorem ipsum">
    <meta name="keywords"
        content="lorem, ipsum">
    <meta name="author" content="Phoenixcoded">
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/inter/inter.css') }}" id="main-font-link">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/phosphor/duotone/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/plugins/notifier.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" id="main-style-link">
    {{-- <script>function changebrand(presetColor) {
        const bodyElement = document.querySelector('body');
        removeClassByPrefix(bodyElement, 'bg-');
        removeClassByPrefix(bodyElement, 'from-');
        removeClassByPrefix(bodyElement, 'to-');
        // console.log(presetColor);
        bodyElement.setAttribute('class',presetColor);
      }
      localStorage.setItem('layout', 'verticle');
      </script> --}}
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body>
    @inertia
    <script data-cfasync="false" src="{{ asset('admin/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/all-earnings-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/page-views-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/total-task-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/download-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/customer-rate-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/tasks-graph.js') }}"></script>
    <script src="{{ asset('admin/assets/js/widgets/total-income-graph.js') }}"></script>
    <!-- [Page Specific JS] end --><!-- Required Js -->
    <script src="{{ asset('admin/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icon/custom-icon.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/component.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <!-- [Page Specific JS] start --><!-- notification Js -->
    <script src="{{ asset('admin/assets/js/plugins/notifier.js') }}"></script>
    <div class="notifier-container" id="notifier-container"></div>
    <script src="{{ asset('admin/assets/js/elements/ac-notification.js') }}"></script>
    <script>
        layout_change('false');
    </script>
    <script>
        layout_theme_contrast_change('false');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_caption_change('true');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change('preset-1');
    </script>
    <script>
        main_layout_change('vertical');
    </script>
</body>

</html>
