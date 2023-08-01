@extends('auth.index')

@section('content')

    <div class="form-group flex-box">
        <a class="back web-item" href="{{ route('login') }}">
            <img src="{{asset('assets/photo/back.png')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
        <div class="position-relative">
            <!-- Nav tabs -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="bold-text padding-item">
                    رمز عبورتو فراموش کردی؟
                </h2>
            </div>

           {{-- <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>

                <li class="nav-item" style="z-index: 2">
                    <a class="nav-link @if(!($errors->phone->first('password') || $errors->phone->first('phone'))) active @endif"
                       id="email-tab" data-toggle="tab" href="#email" role="tab"
                       aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> ایمیل</a>
                </li>
                --}}{{--<li class="nav-item" style="z-index: 2">
                    <a class="nav-link @if($errors->phone->first('password') || $errors->phone->first('phone')) active @endif"
                       id="mobile-tab" data-toggle="tab" href="#mobile" role="tab"
                       aria-controls="profile" aria-selected="false"><i class="fas fa-id-card"></i> موبایل</a>
                </li>--}}{{--
            </ul>--}}

            <!-- Tab panes -->

            <div class="tab-content">
                <div class="tab-pane fade @if(!($errors->phone->first('password') || $errors->phone->first('phone'))) show active @endif"
                     id="email" role="tabpanel" aria-labelledby="email-tab">
                    <form class="position-relative" method="GET" action="{{ route('forget_password_email') }}">
                        @csrf
                        <div class="left circle-blur mobile-item"></div>
                        <img class="cloud-in-form mobile-item" src="{{asset('assets/icon/cloud2.svg')}}">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row input-group">
                                    <label>ایمیل</label>
                                    <input type="text" placeholder=" ایمیل " name="email" value="{{ old('email') }}">
                                    @error('email' , 'email')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="button p-button justify-content-center margin">
                                    بازيابي رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            {{--    <div class="tab-pane fade @if($errors->phone->first('password') || $errors->phone->first('phone')) show active @endif"
                     id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                    <form class="position-relative" method="GET" action="{{ route('forget_password_phone') }}">
                        @csrf
                        <div class="left circle-blur mobile-item"></div>
                        <img class="cloud-in-form mobile-item" src="{{asset('assets/icon/cloud2.svg')}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row input-group">
                                    <label>شماره تلفن</label>
                                    <input type="text" placeholder=" شماره تلفن خود را وارد کنید  " name="phone"
                                           value="{{ old('phone') }}">
                                    @error('phone', 'phone')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class=" flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="button p-button justify-content-center margin">
                                    بازيابي رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>--}}

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $(".nav-tabs a").click(function () {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $(" .slider").css({"left": +position.left, "width": width});
        });
        var actWidth = $(".nav-tabs").find(".active").parent("li").width();
        var actPosition = $(".nav-tabs .active").position();
        $(".slider").css({"left": +actPosition.left, "width": actWidth});

        $(".dropdown-menu li a").click(function (evt) {
            // Setup VARs
            var inputGroup = $('.input-group');
            var inputGroupBtn = inputGroup.find('.input-group-btn .btn');
            var inputGroupAddon = inputGroup.find('.input-group-addon');
            var inputGroupInput = inputGroup.find('.form-control');

            // Get info for the selected country
            var selectedCountry = $(evt.target).closest('li');
            var selectedEmoji = selectedCountry.find('.dial-code').html();
            var selectedExampleNumber = selectedCountry.find('.example-number').html();
            var selectedCountryCode = selectedCountry.find('.country-code').html();

            // Dynamically update the picker
            inputGroupBtn.find('.code').html(selectedEmoji);
            inputGroupAddon.html(selectedCountryCode)
            inputGroupInput.attr("placeholder", selectedExampleNumber);
        });
    </script>
@endsection
