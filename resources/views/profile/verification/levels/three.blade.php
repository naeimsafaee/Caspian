@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5>ارتقا به سطح سه</h5>
    </div>
@endsection

@section('content')
    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="overflow-visible items  position-relative">
            {{--            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">--}}
            <div class="row">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <h5>
                        تعهدنامه صرافی
                    </h5>
                </div>
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <p>
                        {{ setting('text.tahodname') }}
                    </p>
                </div>
                <form method="post" action="{{ route('level_three_submit') }}">
                    @csrf
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <label class="container-checkbox">

                            <input type="checkbox" name="commitment">
                            <span class="checkmark"></span>
                            مطالعه کردم

                        </label>
                    </div>
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <button type="submit" class="p-button button b-w-w flex-box"> ادامه</button>

                            @error('commitment')
                            <div>
                                <p style="color: #B35858; font-size:14px; font-weight:normal; margin-top: 15px">
                                    {{ $message }}
                                </p>
                            </div>

                            @enderror
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
