@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5>ارتقا به سطح سه</h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="overflow-visible items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form method="post" action="{{ route('level_three2_submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <label>
                                      ویدئو تعهد نامه
                                    </label>
                                    <div class="control-group file-upload">
                                        {{--                                        <div class="tooltip">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</div>--}}

                                        <div class="upload-image text-center">
                                            <img src="{{asset('assets/icon/upload.svg')}}">
                                            <p> ویدئو خود را اینجا آپلود کنید </p>
                                            <img class="img" src="" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="video" value="{{ old('video') }}">
                                        </div>
                                    </div>
                                    @error('video')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <p>
                                        متن تعهدنامه:
                                    </p>
                                    <p class="grey-text">

                                        @php
                                            $fullname = auth()->guard('clients')->user()->name . " " .  auth()->guard('clients')->user()->last_name;
                                        @endphp

                                        {{ str_replace("%name" ,$fullname , setting('text.tahodname2')) }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row @error('home_phone') error-form @endif ">
                                    <label>
                                       تلفن ثابت
                                    </label>
                                    <input placeholder="تلفن ثابت" type="text" name="home_phone" value="{{ old('home_phone') }}">
                                    @error('home_phone')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box"> تایید </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="position-relative padding-right-items padding-item col-lg-6 col-md-12 col-sm-12">
                    <div class=" error-box d-block no-margin">
                        <p>
                            اخطار !
                        </p>
                        <p class="grey-text">
                            تمام رخ با نور کافی بدون عینک نوشته های کارت واضح و خوانا عکس با دوربین اصلی و توسط فرد دیگری گرفته شودتا نوشته ها برعکس نشود
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(".upload-image").click(function (event) {
            var previewImg = $(this).children(".img");

            $(this)
                .siblings()
                .children("input")
                .trigger("click");

            $(this)
                .siblings()
                .children("input")
                .change(function () {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var urll = e.target.result;
                        $(previewImg).attr("src", urll);
                        previewImg.parent().css("background", "transparent");
                        previewImg.show();
                        previewImg.siblings("p").hide();
                    };
                    reader.readAsDataURL(this.files[0]);
                });
        });

    </script>

@endsection

