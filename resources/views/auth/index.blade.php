<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persian Crypto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
    <script src="{{ asset('assets/js/lodash.js.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="overlay"></div>

    <div class="row blur-row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="flex-box login-form">

                @yield('content')

                <div class="lottie-parent ">
                    <div  id="login-motion" ></div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>

    var svgContainer = document.getElementById('login-motion');
    var animItem = bodymovin.loadAnimation({
        wrapper: svgContainer,
        animType: 'svg',
        loop: true,
        path: '{{ asset('assets/lottie/logo.json') }}',
    });

</script>

<script src="{{asset('assets/js/master.js')}}"></script>
@yield('scripts')
</body>
</html>
