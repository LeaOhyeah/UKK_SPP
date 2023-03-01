<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<style>
    section {
        background-repeat: no-repeat;
        background-size: cover !important;
    }

    body {
        background: linear-gradient(to right, rgb(17, 17, 251), rgb(0, 123, 255))
        /* background-image: radial-gradient(650px circle at 0% 0%,
                #072c63,
                #07367d,
                #084093,
                #0d63e5,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                #072c63,
                #07367d,
                #084093,
                #0d63e5,
                transparent 100%); */
    }

    /* #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#0008fb, #0084ff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#0008fb, #0084ff);
      overflow: hidden;
    } */

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
</style>

<body>

    @yield('content')

</body>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</html>
