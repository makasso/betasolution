<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
    data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                @if (Auth::user()->profile_photo_url)
                    <img alt="Logo" src="{{ Auth::user()->profile_photo_url }}" />
                @else
                    <div
                        class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
                    <span
                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ ucwords(Auth::user()->roles?->first()->name) }}</span>
                </div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" class="menu-link px-5">{{ __('admin/app.app_header.my_profile') }}</a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
        <a href="#" class="menu-link px-5">
            <span class="menu-title position-relative">Mode
                <span class="ms-5 position-absolute translate-middle-y top-50 end-0">{!! getIcon('night-day', 'theme-light-show fs-2') !!}
                    {!! getIcon('moon', 'theme-dark-show fs-2') !!}</span></span>
        </a>
        @include('partials/theme-mode/__menu')
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
        @if (app()->getLocale() === 'en')
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('admin/app.app_header.language') }}
                    <span
                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                        <img class="w-15px h-15px rounded-1 ms-2"
                            src="{{ asset('assets/media/flags/united-states.svg') }}"
                            alt=""></span></span>
            </a>
        @else
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('admin/app.app_header.language') }}
                    <span
                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Français
                        <img class="w-15px h-15px rounded-1 ms-2"
                            src="{{ asset('assets/media/flags/france.svg') }}" alt=""></span></span>
            </a>
        @endif
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">

            @if (app()->getLocale() === 'en')
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('change-language', 'fr') }}" class="menu-link d-flex px-5 active">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset('assets/media/flags/france.svg') }}"
                                alt="">
                        </span>Français</a>
                </div>
                <!--end::Menu item-->
            @else
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('change-language', 'en') }}" class="menu-link d-flex px-5 active">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}"
                                alt="">
                        </span>English</a>
                </div>
                <!--end::Menu item-->
            @endif


        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a class="button-ajax menu-link px-5" href="#" data-action="{{ route('logout') }}" data-method="post"
            data-csrf="{{ csrf_token() }}" data-reload="true">
            {{ __('admin/app.app_header.signout') }}
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
