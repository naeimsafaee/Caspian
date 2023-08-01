@extends('layout.index')

@section('content')



    <div class="col-lg-12 col-md-12 col-sm-12">

        <section class="main position-relative">

            <img class="blur-circle big-blur">
            <img class="clouds position-absolute" src="{{asset('assets/icon/cloud2.svg')}}">
            <div class="row margin-bottom">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="row-items box-item box-row position-relative">
                        <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                        <div class="row z-index-1 position-relative">
                            <div class="margin col-lg-5 col-md-6 col-sm-12">
                                <img class=" responsive-image" src="{{asset('assets/icon/ask-me.svg')}}">
                                <h2 class="bold-text white-text margin-bottom">
                                    سوالی ذهنتو مشغول کرده؟
                                </h2>
                                <p class="grey-text no-margin">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                    می باشد. کتابهای زیادی در شصت و سه درصد گذشته،لورم ایپسوم متن ساختگی با تولید سادگی
                                    نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                                </p>
                            </div>
                            <div class="flex-box margin-right-auto col-lg-5 col-md-6 col-sm-12">

                                <form method="post" action="{{ route('contact_us') }}">
                                    
                                    <div class=" col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            @if (\Session::has('success'))
                                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                    <div class="flex-box error-box justify-content-start"
                                                         style="background: linear-gradient(134.47deg, rgb(96 229 131 / 10%) 36.17%, rgb(97 193 122 / 10%) 58.77%, rgb(62 150 105 / 10%) 74.8%);border: 1px solid rgb(96 229 119 / 30%);color: #5db358;">
                                                        <img src="{{asset('assets/icon/error_green.svg')}}">

                                                        {!! \Session::get('success') !!}

                                                        <img class="close-error" src="{{asset('assets/icon/close_green.svg')}}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label> نام </label>
                                                <input type="text" placeholder=" نام خود را وارد کنید" name="name"
                                                       value="{{ old('name') }}">
                                                @error('name')
                                                <p class="form-error-text" style="margin: unset">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label> ایمیل </label>
                                                <input type="text" placeholder=" ایمیل خود را وارد کنید" name="email"
                                                       value="{{ old('email') }}">
                                                @error('email')
                                                <p class="form-error-text" style="margin: unset">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label> پیام خود را بنویسید </label>
                                                <textarea placeholder=" پیام خود را بنویسید"
                                                          name="content">{{ old('content') }}</textarea>
                                                @error('content')
                                                <p class="form-error-text" style="margin: unset">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class=" flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit"
                                                    class="margin-item min-width button p-button justify-content-center ">
                                                ارسال
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
