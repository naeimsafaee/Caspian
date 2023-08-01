<div class="padding-item col-lg-12 col-md-12 col-sm-12">
    <section class="nav-bar-container flex-box">
        <div class="nav-bar flex-box">
            <div class="mobile-item flex-box justify-content-between">
                <a class="mobileNotifIcon">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M19.8337 28.3335C19.5038 28.7734 19.076 29.1304 18.5842 29.3763C18.0924 29.6221 17.5502 29.7502 17.0003 29.7502C16.4505 29.7502 15.9082 29.6221 15.4164 29.3763C14.9247 29.1304 14.4969 28.7734 14.167 28.3335"
                                stroke="#D7D4ED" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        <path
                                d="M8.50013 17.6824V12.75C8.50013 10.4957 9.39566 8.33365 10.9897 6.73959C12.5838 5.14553 14.7458 4.25 17.0001 4.25V4.25C19.2545 4.25 21.4165 5.14553 23.0105 6.73959C24.6046 8.33365 25.5001 10.4957 25.5001 12.75V17.6824H25.4937L27.443 19.6333C27.8655 20.056 28.1531 20.5946 28.2695 21.1808C28.3859 21.7671 28.3259 22.3747 28.097 22.9268C27.8681 23.4789 27.4807 23.9508 26.9836 24.2827C26.4866 24.6147 25.9023 24.7918 25.3046 24.7917H8.69563C8.09794 24.7918 7.51365 24.6147 7.01661 24.2827C6.51957 23.9508 6.13212 23.4789 5.90324 22.9268C5.67435 22.3747 5.61432 21.7671 5.73073 21.1808C5.84713 20.5946 6.13475 20.056 6.55722 19.6332L8.50655 17.6824"
                                stroke="#D7D4ED" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                    </svg>

                </a>
                <a id="nav-toggle" href="#!">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25146 8.50355H29.7621" stroke="#D7D4ED" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.0931 17.007H4.25146" stroke="#D7D4ED" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.25146 25.5104H18.424" stroke="#D7D4ED" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </a>

            </div>
            <div class="web-item flex-box justify-content-between">
                <nav>
                    <ul class="nav-list">
                        @if(auth()->guard('clients')->check())

                            <li class="position-relative ">
                                <a class="flex-box user-details position-relative " style="margin-left: 0">
                                    @php
                                        $notif_count = \App\Models\ClientNotification::query()->where(['client_id' => auth()->guard('clients')->user()->id , 'is_read' => false])->count();
                                    @endphp
                                    @if($notif_count > 0)
                                        <div class="notif notification_count">{{ $notif_count }}</div>
                                    @endif
                                    <div class="image-box loadNotification">
                                        <img class="user-icon" src="{{asset('assets/icon/user.svg')}}">
                                    </div>
                                </a>
                            </li>

                            <li class="position-relative">
                                <a class="flex-box user-details position-relative" href="{{ route('profile_info') }}">
                                    <div>
                                        <h5 class="white-text  bold-text">
                                            سلام {{ auth()->guard('clients')->user()->name }}
                                        </h5>
                                        <p class="white-text no-margin">
                                            تنظیمات
                                        </p>
                                    </div>
                                </a>
                                @if($notif_count > 0)
                                    @include('layout.notification')
                                @endif

                            </li>
                        @else
                            <li>
                                <a class="logo" href="{{ route('home') }}">
                                    <img src="{{asset('assets/icon/logo.png')}}">
                                </a>
                            </li>
                        @endif


                        <li>
                            <a class="flex-box" href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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

                                <p>
                                    سرویس ها
                                </p>

                                <svg class="arrow" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 10L12 14L16 10" stroke="#D7D4ED" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>


                            </a>
                            <ul class="nav-dropdown">
                                <li>
                                    <a class="blur-hover flex-box justify-content-center"
                                       href="{{ route('exchange') }}">
                                        <div class="glow"></div>
                                        <svg width="55" height="56" viewBox="0 0 55 56" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M47.2697 41.5059L40.5168 48.2587"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M47.2697 48.2587V41.5059H40.5168"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.75281 14.4943L13.5056 7.74146"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M21.3839 46.0074C28.2212 46.0074 33.764 40.4646 33.764 33.6272C33.764 26.7899 28.2212 21.2471 21.3839 21.2471C14.5465 21.2471 9.00372 26.7899 9.00372 33.6272C9.00372 40.4646 14.5465 46.0074 21.3839 46.0074Z"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M41.3927 31.1267C46.2275 26.2919 46.2275 18.4533 41.3927 13.6185C36.558 8.78374 28.7193 8.78374 23.8845 13.6185"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M22.9747 28.659L26.3517 32.035C27.2308 32.9139 27.231 34.339 26.3522 35.2182L22.9762 38.5951C22.0972 39.4742 20.6721 39.4744 19.7929 38.5956L16.4161 35.2196C15.5369 34.3407 15.5367 32.9155 16.4156 32.0364L19.7915 28.6595C20.6704 27.7804 22.0956 27.7801 22.9747 28.659Z"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p>
                                            بازار
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="blur-hover flex-box justify-content-center"
                                       href="{{ route('trade_single' , ['BTC-USDT']) }}">
                                        <div class="glow"></div>
                                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M31.4999 43.4994H37.5007C41.6429 43.4994 44.9999 40.1424 44.9999 36.0002"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M35.2507 47.2502L31.4999 43.4994L35.2507 39.7509"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M22.5001 10.5007H16.4993C12.3571 10.5007 9.00006 13.8577 9.00006 18"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.7493 6.75L22.5001 10.5008L18.7493 14.2492"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M9.00006 39.9396V40.2163C9.00006 42.2368 10.6381 43.8748 12.6586 43.8748H16.5938C18.6121 43.8748 20.2501 42.2368 20.2501 40.2163V40.2163C20.2501 38.5176 19.0801 37.0416 17.4263 36.6546L11.8261 35.3428C10.1701 34.9581 9.00006 33.4821 9.00006 31.7833V31.7833C9.00006 29.7628 10.6381 28.1248 12.6586 28.1248H16.5938C18.6121 28.1248 20.2501 29.7628 20.2501 31.7833V32.0601"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M41.1232 25.8747H33.768C33.759 25.8747 33.75 25.8657 33.75 25.8567V18.1392C33.75 18.1302 33.759 18.1212 33.768 18.1212H41.1232C43.2652 18.1212 45 19.8559 45 21.9979V21.9979C45 24.1399 43.2652 25.8747 41.1232 25.8747V25.8747Z"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M33.75 18.1215V10.125H40.1377C42.345 10.125 44.136 11.916 44.136 14.1232V14.1232C44.136 16.3305 42.3337 18.1215 40.113 18.1215"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M38.25 10.1248V7.87482" stroke="#685587"
                                                  stroke-width="3" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M38.25 28.1252V25.8752" stroke="#685587"
                                                  stroke-width="3" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M14.625 28.1252V25.8752" stroke="#685587"
                                                  stroke-width="3" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M14.625 46.125V43.875" stroke="#685587"
                                                  stroke-width="3" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                        <p>
                                            مبادلات
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="blur-hover flex-box justify-content-center"
                                       href="{{ route('copytrade') }}">
                                        <div class="glow"></div>
                                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M15.75 49.5C22.5562 49.5 28.1272 43.9312 28.1272 37.1272C28.1272 30.3232 22.5562 24.75 15.75 24.75C8.94375 24.75 3.375 30.3187 3.375 37.1272C3.375 39.9037 4.31325 42.4643 5.87025 44.5343C8.136 47.5403 11.7225 49.5 15.75 49.5Z"
                                                  stroke="#685587" stroke-width="3"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M33.4125 44.7098H37.0777C42.1357 44.7098 46.2375 40.6081 46.2375 35.55"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M20.5875 9.29028H16.9223C11.8643 9.29028 7.76251 13.392 7.76251 18.45"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M17.8403 6.54077L20.5875 9.29027L17.8403 12.0375"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M50.625 16.875C50.625 23.7105 45.0855 29.25 38.25 29.25C31.4145 29.25 25.875 23.7105 25.875 16.875C25.875 10.0395 31.4145 4.5 38.25 4.5C45.0832 4.5 50.625 10.0395 50.625 16.875"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                    d="M36.1597 47.4591L33.4125 44.7119L36.1597 41.9646"
                                                    stroke="#685587" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        <p>
                                            کپی تریدینگ
                                        </p>

                                    </a>

                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}" class="flex-box">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M15 17L16 15L13.052 13.019L11.109 12.895L10 14L12 17H15Z"
                                            stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    <path
                                            d="M12.8129 3.03498C7.18892 2.54598 2.54592 7.18898 3.03492 12.813C3.40692 17.092 6.90692 20.592 11.1859 20.964C16.8099 21.453 21.4529 16.811 20.9639 11.186C20.5919 6.90798 17.0919 3.40798 12.8129 3.03498V3.03498Z"
                                            stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    <path
                                            d="M3.95093 7.96101L7.99993 11L9.00493 9.00501L12.9999 8.00001L14.1819 3.27301"
                                            stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                </svg>
                                <p>
                                    آموزش
                                </p>
                            </a>
                        </li>

                        <li>
                            <a class="flex-box" href="{{ route('pages' , 'قوانین') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 9.5H15.5" stroke="#D7D4ED" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.5 13.5H15.5" stroke="#D7D4ED" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                            d="M20 11.242C20 15.61 16.843 19.704 12.52 20.928C12.182 21.024 11.818 21.024 11.48 20.928C7.157 19.705 4 15.61 4 11.242V7.21399C4 6.40199 4.491 5.66999 5.243 5.36299L10.107 3.37299C11.321 2.87599 12.681 2.87599 13.894 3.37299L18.758 5.36299C19.509 5.66999 20 6.40199 20 7.21399V11.242Z"
                                            stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                </svg>
                                <p>
                                    قوانین
                                </p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-box" href="{{ route('contactus') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M10.0476 13.869C8.87755 12.699 7.99555 11.389 7.40955 10.06C7.28555 9.77897 7.35855 9.44997 7.57555 9.23297L8.39455 8.41397C9.06555 7.74297 9.06555 6.79397 8.47955 6.20797L7.30555 5.03497C6.52455 4.25397 5.25855 4.25397 4.47755 5.03497L3.82555 5.68597C3.08455 6.42697 2.77555 7.49597 2.97555 8.55597C3.46955 11.169 4.98755 14.03 7.43655 16.479C9.88555 18.928 12.7466 20.446 15.3596 20.94C16.4196 21.14 17.4886 20.831 18.2296 20.09L18.8806 19.439C19.6616 18.658 19.6616 17.392 18.8806 16.611L17.7076 15.438C17.1216 14.852 16.1716 14.852 15.5866 15.438L14.6836 16.342C14.4666 16.559 14.1376 16.632 13.8566 16.508C12.5276 15.921 11.2176 15.038 10.0476 13.869V13.869Z"
                                            stroke="#D7D4ED" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    <path d="M12.9194 5.16996V2.82996" stroke="#D7D4ED"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M17.0896 6.81993L18.7396 5.17993" stroke="#D7D4ED"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M18.7495 10.9999H21.0795" stroke="#D7D4ED"
                                          stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                                <p>
                                    تماس باما
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                @if(auth()->guard('clients')->check())
                    <a class="flex-box black-button" href="{{ route('dashboard') }}">
                        داشبورد
                    </a>
                @else
                    <a class="flex-box black-button" href="{{ route('login') }}">
                        حساب کاربری
                    </a>

                @endif
            </div>

        </div>
    </section>
</div>
