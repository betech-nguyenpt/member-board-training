<!DOCTYPE html>
<html lang="ja" xml:lang="ja" ng-app="app">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('app.msg_0000')</title>
    <!-- START CSS -->
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('assets/nobleui/css/library.min.css') }}" rel="stylesheet">
    <link href="{{ mix('assets/nobleui/css/custom.min.css') }}" rel="stylesheet">
    <script src="{{ mix('assets/nobleui/js/angularjs.min.js') }}"></script>
    <script src="{{ mix('assets/nobleui/js/root-angularjs.min.js') }}"></script>
    <!-- END CSS -->

    <!-- START CUSTOM CSS -->
    @stack('customCSS')
    <!-- END CUSTOM CSS -->
</head>

<body>
    <div class="main-wrapper" ng-controller="RootController">
        <div class="page-wrapper">
            <!-- START PAGE CONTENT -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- END PAGE CONTENT -->

            <!-- START FOOTER -->
            @include('nobleui.layouts.footer')
            <!-- END FOOTER -->
        </div>
    </div>

    <!-- START JS -->

    <script src="{{ mix('assets/js/app.js') }}"></script>
    <script src="{{ mix('assets/nobleui/js/library.min.js') }}"></script>
    <!-- END JS -->

    <!-- START CUSTOM JS -->
    @stack('customScript')
    <!-- END CUSTOM JS -->
</body>

</html>
