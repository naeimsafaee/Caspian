@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5>ارتقا به سطح دو</h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="overflow-visible items  position-relative">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class="padding-item col-lg-6 col-md-6 col-sm-12">
                    <form method="post" action="{{ route('level_two_submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <label>
                                        عکس روی کارت ملی
                                    </label>
                                    <div class="control-group file-upload">
{{--                                        <div class="tooltip">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</div>--}}

                                        <div class="upload-image text-center">
                                            <img src="{{asset('assets/icon/upload.svg')}}">
                                            <p> عکس روی کارت ملی را اینجا آپلود کنید </p>
                                            <img class="img" src="" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="front_image" value="{{ old('front_image') }}">
                                        </div>
                                    </div>
                                    @error('front_image')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <label>
                                        عکس پشت کارت ملی
                                    </label>
                                    <div class="control-group file-upload">
{{--                                        <div class="tooltip">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</div>--}}

                                        <div class="upload-image text-center">
                                            <img src="{{asset('assets/icon/upload.svg')}}">
                                            <p> عکس پشت کارت ملی را اینجا آپلود کنید </p>
                                            <img class="img" src="" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="back_image">
                                        </div>
                                    </div>
                                    @error('back_image')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <label>
                                        آدرس
                                    </label>
                                    <textarea placeholder="آدرس" type="text" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="input-row @error('postal_code') error-form @enderror ">
                                    <label>
                                        کد پستی
                                    </label>
                                    <input placeholder="کد پستی " type="text" name="postal_code" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button flex-box col-lg-12"> تایید </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div
                    class="align-items-start flex-box justify-content-center  web-item padding-item col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset('assets/icon/change-pass.svg')}}">
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
