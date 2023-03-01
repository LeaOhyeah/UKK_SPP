<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="text-center">SPPay | {{ $title }}</title>

    {{-- bootstrap --}}
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet"> --}}

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Buttons-2.3.3/css/buttons.bootstrap5.css') }}" />

</head>

<body>

    @include('dashboard.layouts.header')
    <div class="container">
        @yield('content')
    </div>

    {{-- jquery --}}
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    {{-- bootstrap --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/datatables.js') }}"></script>
    {{-- https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js --}}

    {{-- datatable --}}
    <script src="{{ asset('assets/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.13.1/js/dataTables.bootstrap5.min.js') }}"></script>

    {{-- button --}}
    <script src="{{ asset('assets/Buttons-2.3.3/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/Buttons-2.3.3/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.36/pdfmake.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/Buttons-2.3.3/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/Buttons-2.3.3/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/Buttons-2.3.3/js/buttons.colVis.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    @stack('skrip')
</body>

</html>
