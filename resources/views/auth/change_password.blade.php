@extends('auth.index')

@section('content')
    <div class="form-group flex-box">
        <a class="back web-item" href="{{ route('home') }}">
            <img src="{{asset('assets/photo/back.png')}}">
        </a>
        <div class="blur web-item">
            <div class="circle-one"></div>
        </div>
        <div class="position-relative">
            <!-- Nav tabs -->

            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="bold-text padding-item">
                    تغییر رمز عبور
                </h2>
            </div>

            <ul class="nav nav-tabs nav-justified margin-top" role="tablist">

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="email-tab">
                    <form class="position-relative" method="post" action="{{ route('change_submit') }}">
                        @csrf
                        <div class="left circle-blur mobile-item"></div>
                        <img class="cloud-in-form mobile-item" src="{{asset('assets/icon/cloud2.svg')}}">
                        <div class="row">
                            <input type="hidden" name="reset_link" value="{{ $reset_link }}" >

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row">
                                    <input type="password" placeholder=" رمز عبور " name="password">
                                    @error('password')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row">
                                    <input type="password" placeholder="تکرار رمز عبور" name="password_confirmation">
                                    @error('password_confirmation')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" flex-box justify-content-start col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="button p-button justify-content-center margin">
                                    تغییر رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

