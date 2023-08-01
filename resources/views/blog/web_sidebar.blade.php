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
                        دسته بندی ها
                    </h5>

                </div>
                <div class="gradient-line"></div>
                <ul class="footer-list">
                    @foreach($categories as $category)
                        <li>
                            <a class="flex-box" href="{{ route('blog_category' , $category->slug) }}">
                                <span class="flex-box  @if(url()->current() == route('blog_category', $category->slug)) active_radio_button @endif">
                                    <span class="on-hover @if(url()->current() == route('blog_category', $category->slug)) active_radio_button @endif">

                                    </span>
                                </span>
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="items justify-content-start  position-relative">
                <img class="z-index-0 bg" src="{{asset('assets/photo/row-item.png')}}">
                <h5 class="bold-text text-center">
                    سوالی داری؟
                </h5>
                <a class="flex-box ask-me" href="{{ route('contactus') }}">
                    از من بپرس
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3996 6.414L16.5716 3.586C16.1966 3.211 15.6876 3 15.1576 3H7.9856C6.8806 3 5.9856 3.895 5.9856 5V19C5.9856 20.105 6.8806 21 7.9856 21H17.9856C19.0906 21 19.9856 20.105 19.9856 19V7.828C19.9856 7.298 19.7746 6.789 19.3996 6.414V6.414Z"
                            stroke="#7A7982" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path d="M19.9856 8H15.9856C15.4336 8 14.9856 7.552 14.9856 7V3"
                              stroke="#7A7982" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path
                            d="M16.1806 17.9997C16.0256 17.6097 15.7846 17.2587 15.4766 16.9737C14.9546 16.4907 14.2706 16.2217 13.5596 16.2217H12.4116C11.7006 16.2217 11.0156 16.4907 10.4946 16.9737C10.1856 17.2587 9.94565 17.6097 9.79065 17.9997"
                            stroke="#7A7982" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path
                            d="M14.1346 11.0687C14.7692 11.7033 14.7692 12.7322 14.1346 13.3668C13.5 14.0014 12.4711 14.0014 11.8365 13.3668C11.2019 12.7322 11.2019 11.7033 11.8365 11.0687C12.4711 10.4341 13.5 10.4341 14.1346 11.0687Z"
                            stroke="#7A7982" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                </a>
            </div>
        </div>

    </div>

</div>
