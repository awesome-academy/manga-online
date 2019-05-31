<header id="m_header" class="m-grid__item m-header" m-minimize="minimize" m-minimize-mobile="minimize"
        m-minimize-offset="10" m-minimize-mobile-offset="10">
    <div class="m-header__top">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- begin::Brand -->
                <div class="m-stack__item m-brand m-stack__item--left">
                    <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="#" class="m-brand__logo-wrapper">
                                <img alt=""
                                     src="{{ asset(config('assets.path_bower') . '/demo10/assets/demo/demo10/media/img/logo/logo_mini.png') }}"
                                     class="m-brand__logo-desktop"/>
                                <img alt=""
                                     src="{{ asset(config('assets.path_bower') . '/demo10/assets/demo/demo10/media/img/logo/logo_mini.png') }}"
                                     class="m-brand__logo-mobile"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- begin::Quick Actions-->
                            <a href="#" class="btn btn-link m-btn m-btn--icon m-btn--pill m-link">
                                <span>@lang('frontend.home')</span>
                            </a>
                            <!-- begin::Responsive Header Menu Toggler-->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- end::Responsive Header Menu Toggler-->
                            <!-- begin::Topbar Toggler-->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                            <!--end::Topbar Toggler-->
                        </div>
                    </div>
                </div>
                <!-- end::Brand -->
                <!-- begin::Topbar -->
                <div class="m-stack__item m-stack__item--right m-header-head" id="m_header_nav">
                    <div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                @if(empty(session('users')))
                                    <li class="m-nav__item m-nav__item--primary m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
                                        m-dropdown-toggle="click">
                                        <a href="javascript:void(0);" class="m-nav__link" id="login_facebook_btn"
                                           route="{{ route('client.login', ['provider' => 'facebook']) }}">
                                            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                            <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i
                                                            class="flaticon-facebook-letter-logo"></i></span></span>
                                        </a>
                                    </li>
                                @else
                                    <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                        m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            <img src="{{ session('users')->avatar ?? asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                                 class="m--img-rounded m--marginless m--img-centered"
                                                 alt=""/>
                                        </span>
                                            <span class="m-nav__link-icon m-topbar__usericon m--hide">
                                            <span class="m-nav__link-icon-wrapper"><i
                                                        class="flaticon-user-ok"></i></span>
                                        </span>
                                            <span class="m-topbar__username m--hide">@lang('frontend.home')</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <div class="m-card-user m-card-user--skin-light">
                                                        <div class="m-card-user__pic">
                                                            <img src="{{ session('users')->avatar ?? asset(config('assets.path_bower') . '/demo10/assets/app/media/img/users/user4.jpg') }}"
                                                                 class="m--img-rounded m--marginless" alt=""/>
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">{{ session('users')->fullname }}</span>
                                                            <a href=""
                                                               class="m-card-user__email m--font-weight-300 m-link">{{ session('users')->email }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text"></span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-text">@lang('frontend.profile')</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('client.logout') }}"
                                                                   class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">@lang('frontend.log_out')</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end::Topbar -->
            </div>
        </div>
    </div>
</header>
