<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('backEnd/assets/img/aub.png') }}" />
    <!-- DataTable New -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.css"/>
    <!-- iziToast -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('backEnd.layouts.partials.header')
            @include('backEnd.layouts.partials.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('backEnd.layouts.partials.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('backEnd/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('backEnd/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('backEnd/assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('backEnd/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('backEnd/assets/js/custom.js') }}"></script>
    <!-- Data table -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/customSweetalert2.js') }}"></script>
    <!-- iziToast -->
    <script type="text/javascript" src="{{ asset('js/iziToast.js') }}"></script>
    <script>
        //datatable
        $(document).ready( function () {
            $('#tableExport').DataTable();
        } );

        $(document).ready( function () {
            $('#tableExport1').DataTable();
        } );
    </script>

    @yield('js')
    @include('vendor.lara-izitoast.toast')
</body>

</html>
