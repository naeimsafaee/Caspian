<div class="mobile-item mobile-category">
    <img src="{{asset('assets/icon/category.svg')}}">
    <div class="pop-up">
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
                <a class="flex-box" href="{{ route('profile_info') }}">
                    <span class="flex-box"><span class="on-hover"></span></span>
                    اطلاعات کاربری
                </a>
            </li>
            <li>
                <a class="flex-box" href="{{ route('change_password') }}">
                    <span class="flex-box"><span class="on-hover"></span></span>
                    تعویض رمز
                </a>
            </li>
            <li>
                <a class="flex-box" href="{{ route('security') }}">
                    <span class="flex-box"><span class="on-hover"></span></span>
                    امنیت
                </a>
            </li>
            <li>
                <a class="flex-box" href="{{ route('verification') }}">
                    <span class="flex-box"><span class="on-hover"></span></span>
                    ارتقا حساب کاربری
                </a>
            </li>
        </ul>
        <div class="gradient-line"></div>
        @include('dashboard.wallet.mobile_sidebar_component')

        <a class="see-all margin-top flex-box ask-me">
            مشاهده تمام تراکنش ها
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 12.7852H19.5" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 7.78516L5.5 12.7852" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 17.7852L5.5 12.7852" stroke="#7A7982" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </a>

    </div>
</div>
