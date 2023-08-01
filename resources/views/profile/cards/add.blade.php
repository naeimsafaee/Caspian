@extends('profile.index')

@section('content_head')
    <div class="history-item flex-box">
        <h5 class="no-margin">
            افزودن کارت
        </h5>
    </div>
@endsection

@section('content')

    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
        <div class="items  position-relative overflow-visible">
            <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
            <div class="row">
                <div class=" col-lg-6 col-md-12 col-sm-12">
                    <form method="POST" action="{{ route('submit_cards_add') }}">
                        @csrf
                        <div class="row">
                            <div class="padding-item col-lg-12">
                                <div class="input-row">
                                    <label>
                                        نام صاحب کارت
                                    </label>
                                    <input name="owner" placeholder="نام صاحب کارت " value="{{ old('owner') }}"
                                           class=" @error('owner') error-form @enderror ">
                                    @error('owner')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="padding-item col-lg-12">
                                <div class="input-row">
                                    <label>
                                        شماره کارت
                                    </label>
                                    <input id="card_number" name="card_number" placeholder="شماره کارت"
                                           value="{{ old('card_number') }}"
                                           class=" @error('card_number') error-form @enderror "
                                           onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    @error('card_number')
                                    <p class="form-error-text">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="padding-item col-lg-12">
                                <div class="input-row">
                                    <label>
                                        نام بانک
                                    </label>
                                    <div class="drop-down no-margin">
                                        <div class="selected ">
                                            <a class="flex-box justify-content-between" id="selected_bank">
                                                <span class="chose">
                                                    <div class="flex-box crypto">
                                                        <p class="no-margin grey-text">
                                                            {{ $banks->first()->name }}
                                                        </p>
                                                    </div>
                                                </span>
                                                <img src="{{asset('assets/icon/arrow s.svg')}}">
                                            </a>
                                        </div>

                                        <div class="options">
                                            <ul>
                                                <img class="z-index-0 bg"
                                                     src="{{asset('assets/photo/input-blur.png')}}">
                                                @foreach($banks as $bank)
                                                    <li class="banks" data-prefix="{{ $bank->prefix }}"
                                                        data-id="{{ $bank->id }}"
                                                        data-name="{{ $bank->name }}">
                                                        <a>
                                                            <div class="flex-box crypto justify-content-start">
                                                                <p class="no-margin grey-text">
                                                                    {{ $bank->name }}
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <input name="bank_id" id="bank_id" type="hidden" value="{{ $bank->first()->id }}"/>

                            <div class=" col-lg-12">
                                <div class="row">
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 co-12">
                                        <div class="input-row">
                                            <label>
                                                تاریخ انقضا
                                            </label>
                                            <input name="expiry_date" type="text"
                                                   class="data-picker pwt-datepicker-input-element"
                                                   placeholder="-- / -- " value="{{ old('expiry_date') }}">
                                        </div>
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 co-12">
                                        <div class="input-row">
                                            <label class="left-text">
                                                cvv2
                                            </label>
                                            <input name="cvv2" value="{{ old('cvv2') }}" class="left-text"
                                                   placeholder="cvv2">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            @error('expiry_date')
                            <p style="color: #B35858;margin-bottom: 0;">
                                {{ $message }}
                            </p>
                            @enderror
                            @error('cvv2')
                            <p style="color: #B35858;margin-bottom: 0;">
                                {{ $message }}
                            </p>
                            @enderror

                            <div class="padding-item col-lg-12 ">
                                <div class="input-row">
                                    <button type="submit" class="p-button button  flex-box" style="width: 100%"> بررسی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="flex-box padding-item col-lg-6 col-md-12 col-sm-12">
                    <img src="{{asset('assets/icon/card.svg')}}">
                </div>


            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/tailwind.min.css" rel="stylesheet">

    <script src="{{asset('assets/js/drop-down.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>

    <script>

        const banks = $('.banks');

        function detect_card() {
            const value = $("#card_number").val().substr(0, 6);

            for (let i = 0; i < banks.length; i++) {

                if (value === banks.eq(i).attr('data-prefix')) {
                    $("#selected_bank p").text(banks.eq(i).attr('data-name'))
                    $("#bank_id").val(banks.eq(i).attr('data-id'))
                }

            }
        }

        $("#card_number").on('keyup', detect_card)

        detect_card()

        $('.banks').click(function () {
            $("#bank_id").val($(this).attr('data-id'))
        })

        $(document).ready(function () {
            $(".data-picker").pDatepicker({
                initialValueType: "gregorian",
                format: "YY/MM",
                onSelect: "year",
                dayPicker:false
            });
        });
    </script>

@endsection
