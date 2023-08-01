<head>
    <meta charset="UTF-8">
    <title>{{setting('site.title')}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ \TCG\Voyager\Facades\Voyager::image(setting('site.logo')) }}">

    <link href="{{asset('assets/lib/tailwind.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script src="{{asset('assets/lib/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/lib/lottie.min.js')}}"></script>


    <script src="{{asset('assets/lib/persian-date.js')}}"></script>
    <script src="{{asset('assets/lib/persian-datepicker.js')}}"></script>

    @yield('style')

    <style>
        .active_radio_button {
            background: linear-gradient(124.38deg, #9D77CE -24.39%, #34145E 91.85%) !important;
        }
    </style>


</head>
