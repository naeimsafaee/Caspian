<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
<div class="container-fluid index">
    <div class="overlay"></div>

    @include('layout.mobile_menu')

    <div class="row main-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <img class="position-absolute left-cloud" src="{{asset('assets/icon/clods3.svg')}}">
                <div class="row">

                    @include('layout.header')

                    @yield('content')

                    @include('layout.footer')
                </div>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('assets/js/master.js')}}"></script>
<script src="{{asset('assets/js/socail-hover.js')}}"></script>

@yield('scripts')

<script>
    function load_notification() {
        $.ajax({
            url: '{{ route('read_notification') }}',
            method: 'get',
            data: {_token: "{{ csrf_token() }}"}
        }).then((res) => {

            $(".notification_count").text("0")

        }).catch((err) => {

        })
    }
</script>

</body>
</html>
