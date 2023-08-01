<div class="sidebar">
    <nav>

        <ul class="nav-list">
            @if(auth()->guard('clients')->check())

                <li class="position-relative">
                    <a class="flex-box user-details position-relative" href="{{ route('dashboard') }}">

                        <div>
                            <h5 class="white-text  bold-text">
                                سلام {{ auth()->guard('clients')->user()->name }}
                            </h5>
                            <p class="white-text no-margin">
                                داشبورد
                            </p>
                        </div>
                    </a>
                    <div class="gradient-line"></div>

                </li>

            @endif


            <li>
                <a class="flex-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M8 10H5C3.895 10 3 9.105 3 8V5C3 3.895 3.895 3 5 3H8C9.105 3 10 3.895 10 5V8C10 9.105 9.105 10 8 10Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M19 10H16C14.895 10 14 9.105 14 8V5C14 3.895 14.895 3 16 3H19C20.105 3 21 3.895 21 5V8C21 9.105 20.105 10 19 10Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M8 21H5C3.895 21 3 20.105 3 19V16C3 14.895 3.895 14 5 14H8C9.105 14 10 14.895 10 16V19C10 20.105 9.105 21 8 21Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 15.55H15" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M15 19.45H20" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>

                    </svg>
                    <p>
                        سرویس ها
                    </p>

                    <svg class="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 10L12 14L16 10" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
                <ul class="nav-dropdown">
                    <li>
                        <a href="{{ route('exchange') }}"> صرافی</a>
                    </li>
                    <li>
                        <a href="{{ route('trade_single' , ['BTC-USDT']) }}"> تریدینگ</a>
                    </li>
                    <li>
                        <a href="{{ route('copytrade') }}"> کپی تریدینگ</a>
                    </li>
                </ul>
                <div class="gradient-line"></div>

            </li>
            <li>
                <a href="{{ route('blog') }}" class="flex-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 17L16 15L13.052 13.019L11.109 12.895L10 14L12 17H15Z" stroke="#D7D4ED"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                                d="M12.8129 3.03498C7.18892 2.54598 2.54592 7.18898 3.03492 12.813C3.40692 17.092 6.90692 20.592 11.1859 20.964C16.8099 21.453 21.4529 16.811 20.9639 11.186C20.5919 6.90798 17.0919 3.40798 12.8129 3.03498V3.03498Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.95093 7.96101L7.99993 11L9.00493 9.00501L12.9999 8.00001L14.1819 3.27301"
                              stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>
                        آموزش
                    </p>
                </a>
                <div class="gradient-line"></div>
            </li>
            <li>
                <a class="flex-box" href="{{ route('pages' , 'قوانین') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 9.5H15.5" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M8.5 13.5H15.5" stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path
                                d="M20 11.242C20 15.61 16.843 19.704 12.52 20.928C12.182 21.024 11.818 21.024 11.48 20.928C7.157 19.705 4 15.61 4 11.242V7.21399C4 6.40199 4.491 5.66999 5.243 5.36299L10.107 3.37299C11.321 2.87599 12.681 2.87599 13.894 3.37299L18.758 5.36299C19.509 5.66999 20 6.40199 20 7.21399V11.242Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>
                        قوانین
                    </p>
                </a>
                <div class="gradient-line"></div>

            </li>
            <li>
                <a class="flex-box" href="{{ route('contactus') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M10.0476 13.869C8.87755 12.699 7.99555 11.389 7.40955 10.06C7.28555 9.77897 7.35855 9.44997 7.57555 9.23297L8.39455 8.41397C9.06555 7.74297 9.06555 6.79397 8.47955 6.20797L7.30555 5.03497C6.52455 4.25397 5.25855 4.25397 4.47755 5.03497L3.82555 5.68597C3.08455 6.42697 2.77555 7.49597 2.97555 8.55597C3.46955 11.169 4.98755 14.03 7.43655 16.479C9.88555 18.928 12.7466 20.446 15.3596 20.94C16.4196 21.14 17.4886 20.831 18.2296 20.09L18.8806 19.439C19.6616 18.658 19.6616 17.392 18.8806 16.611L17.7076 15.438C17.1216 14.852 16.1716 14.852 15.5866 15.438L14.6836 16.342C14.4666 16.559 14.1376 16.632 13.8566 16.508C12.5276 15.921 11.2176 15.038 10.0476 13.869V13.869Z"
                                stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.9194 5.16996V2.82996" stroke="#D7D4ED" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.0896 6.81993L18.7396 5.17993" stroke="#D7D4ED" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.7495 10.9999H21.0795" stroke="#D7D4ED" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>
                        تماس باما
                    </p>
                </a>
                <div class="gradient-line"></div>

            </li>
            <li>
                <a class="flex-box" href="{{ route('login') }}">
                    <p>
                        حساب کاربری
                    </p>
                </a>

            </li>

        </ul>
    </nav>

</div>
