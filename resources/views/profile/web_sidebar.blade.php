<div class="web-item padding-item col-lg-3 col-md-4 col-sm-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="items justify-content-start  position-relative">
                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                <div class="flex-box justify-content-start">
                    <svg class="margin-left" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M8 10H5C3.895 10 3 9.105 3 8V5C3 3.895 3.895 3 5 3H8C9.105 3 10 3.895 10 5V8C10 9.105 9.105 10 8 10Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        <path
                                d="M19 10H16C14.895 10 14 9.105 14 8V5C14 3.895 14.895 3 16 3H19C20.105 3 21 3.895 21 5V8C21 9.105 20.105 10 19 10Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        <path
                                d="M8 21H5C3.895 21 3 20.105 3 19V16C3 14.895 3.895 14 5 14H8C9.105 14 10 14.895 10 16V19C10 20.105 9.105 21 8 21Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        <path d="M20 15.55H15" stroke="#D7D4ED" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 19.45H20" stroke="#D7D4ED" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h5 class="no-margin bold-text">
                        حساب کاربری
                    </h5>
                </div>
                <div class="gradient-line"></div>
                <ul class="footer-list">
                    <li>
                        <a class="flex-box"
                           href="{{ route('profile_info') }}">
                            <span class="flex-box @if(url()->current() == route('profile_info')) active_radio_button @endif">
                                <span class="on-hover @if(url()->current() == route('profile_info')) active_radio_button @endif"></span>
                            </span>
                            اطلاعات کاربری
                        </a>
                    </li>
                    <li>
                        <a class="flex-box"
                           href="{{ route('cards') }}">
                            <span class="flex-box @if(url()->current() == route('cards')) active_radio_button @endif">
                                <span class="on-hover @if(url()->current() == route('cards')) active_radio_button @endif"></span>
                            </span>
                            اطلاعات بانکی
                        </a>
                    </li>
                    <li>
                        <a class="flex-box" href="{{ route('change_password') }}">
                            <span class="flex-box @if(url()->current() == route('change_password')) active_radio_button @endif">
                                <span class="on-hover @if(url()->current() == route('change_password')) active_radio_button @endif"></span>
                            </span>
                            تعویض رمز
                        </a>
                    </li>
                    <li>
                        <a class="flex-box active" href="{{ route('security')  }}">
                            <span class="flex-box @if(url()->current() == route('security')) active_radio_button @endif">
                                <span class="on-hover @if(url()->current() == route('security')) active_radio_button @endif"></span>
                            </span>
                            امنیت
                        </a>
                    </li>
                    <li>
                        <a class="flex-box" href="{{ route('verification') }}">
                            <span class="flex-box @if(url()->current() == route('verification')) active_radio_button @endif">
                                <span class="on-hover @if(url()->current() == route('verification')) active_radio_button @endif"></span>
                            </span>
                            ارتقا حساب کاربری
                        </a>
                    </li>
                    <a class="flex-box ask-me" href="{{ route('logout') }}">
                        خروج از حساب
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0068 12.0041H21.0089" stroke="#7A7982" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.0081 14.0056L21.0089 12.0047L19.0081 10.0039" stroke="#7A7982" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.0084 17.0058V19.0067C20.0084 20.1121 19.113 21.0075 18.0075 21.0075H6.00254C4.89708 21.0075 4.00171 20.1121 4.00171 19.0067V5.00083C4.00171 3.89537 4.89708 3 6.00254 3H18.0075C19.113 3 20.0084 3.89537 20.0084 5.00083V7.00167" stroke="#7A7982" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.00387 11.0039V13.0047" stroke="#7A7982" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.00171 19.0037C4.00171 20.4913 5.56736 21.4587 6.89691 20.7934L10.8986 18.7926C11.5769 18.4524 12.005 17.7601 12.005 17.0018V3" stroke="#7A7982" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </ul>
            </div>
        </div>
        @include('dashboard.wallet.web_sidebar_component')

    </div>

</div>
