
<footer class="clean-footer crev bg-img" data-background="/web/assets/imgs/header/bg1.jpg" data-overlay-dark="10">
   
    <div class="container pb-40 section-padding ontop">
        <div class="cal-action pb-50 mb-80 bord-thin-bottom">
            <h2 class="fz-120 line-height-1 d-rotate wow">
                <span class="rotate-text"><a href="/web/contact">{{__('general.Lets Contact')}} <span class="ml-30 fz-70 ti-arrow-top-{{app()->getLocale()=='en'?'right':'left'}}"></span></a></span>
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="logo icon-img-100">
                    <img src="/uploads/{{$web_white_logo}}" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="column">
                    <div class="mb-40">
                        <h6 class="sub-title mb-30">{{__('general.Address')}}</h6>
                        <h5 class="opacity-8">{{$web_address}}</h5>
                    </div>

                    <a href="#0" class="underline">
                        <span class="fz-22 main-color">{{$web_phone}}</span>
                    </a>
                </div>

            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="column">
                    <h6 class="sub-title mb-30">{{__('general.Useful Links')}}</h6>
                    <ul class="rest fz-14">
                        <li class="mb-15">
                            <a href="page-contact.html">{{__('general.Home')}}</a>
                        </li>
                        <li class="mb-15">
                            <a href="/web/about">{{__('general.about')}}</a>
                        </li>
                        <li class="mb-15">
                            <a href="/web/services?page=1&page_size=4">{{__('general.Services')}}</a>
                        </li>
                        <li>
                            <a href="/web/blogs?page=1&page_size=6">{{__('general.Blogs')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="column">
                    <h6 class="sub-title mb-30">{{__('general.Support')}}</h6>
                    <ul class="rest fz-14">
                        <li class="mb-15">
                            <a href="/web/faqs">{{__('general.faqs')}}</a>
                        </li>
                        <li class="mb-15">
                            <a data-bs-toggle="modal" data-bs-target="#termAndCondition" href="page-about.html">{{__('general.Term & Conditions')}}</a>
                        </li>
                        <li class="mb-15">
                            <a  data-bs-toggle="modal" data-bs-target="#privacyPolicy" href="page-about.html">{{__('general.Privacy policy')}}</a>
                        </li>
                        <li>
                            <a href="page-contact.html">{{__('general.Contact Us')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center pt-30 pb-30 mt-80 bord-thin-top">
            <div>
                <ul class="rest d-flex align-items-center">
                    <li class="hover-this cursor-pointer">
                        <a target="__blank" href="{{$web_facebook}}" class="hover-anim">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_behance}}" class="hover-anim">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_linkedin}}" class="hover-anim">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_instgram}}" class="hover-anim">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="https://wa.me/{{$web_whatsapp}}" class="hover-anim">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="ml-auto">
                <ul class="rest d-flex align-items-center">
                    <li class="hover-this cursor-pointer ">
                        <a target="__blank" href="{{$web_twitter}}" class="hover-anim">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_youtube}}" class="hover-anim">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_snapchat}}" class="hover-anim">
                            <i class="fab fa-snapchat"></i>
                        </a>
                    </li>
                    <li class="hover-this cursor-pointer ml-30">
                        <a target="__blank" href="{{$web_tiktok}}" class="hover-anim">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>