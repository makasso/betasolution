@extends('layout.master')

@section('content')

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px">
                        <!--begin::Page-->
                        {{ $slot }}
                        <!--end::Page-->
                        <div class="d-flex flex-stack">
                            <!--begin::Languages-->
                            <div class="me-10 mt-10">
                                <!--begin::Toggle-->
                                @if (app()->getLocale() === 'fr')
                                    <button
                                        class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                        data-kt-menu-offset="0px, 0px">
                                        <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                                            src="{{ asset('assets/media/flags/france.svg') }}" alt="">
                                        <span data-kt-element="current-lang-name" class="me-1">Français</span>
                                        <i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
                                    </button>
                                @else
                                    <button
                                        class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                        data-kt-menu-offset="0px, 0px">
                                        <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                                            src="{{ asset('assets/media/flags/united-states.svg') }}"
                                            alt="">
                                        <span data-kt-element="current-lang-name" class="me-1">English</span>
                                        <i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
                                    </button>
                                @endif
        
                                <!--end::Toggle-->
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
                                    data-kt-menu="true" id="kt_auth_lang_menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        @if (app()->getLocale() === 'en')
                                            <a href="{{ route('change-language', 'fr') }}"
                                                class="menu-link d-flex px-5" data-kt-lang="English">
                                                <span class="symbol symbol-20px me-4">
                                                    <img data-kt-element="lang-flag" class="rounded-1"
                                                        src="{{ asset('assets/media/flags/france.svg') }}"
                                                        alt="french flag">
                                                </span>
                                                <span data-kt-element="lang-name">Français</span>
                                            </a>
                                        @else
                                            <a href="{{ route('change-language', 'en') }}"
                                                class="menu-link d-flex px-5" data-kt-lang="English">
                                                <span class="symbol symbol-20px me-4">
                                                    <img data-kt-element="lang-flag" class="rounded-1"
                                                        src="{{ asset('assets/media/flags/united-states.svg') }}"
                                                        alt="usa flag">
                                                </span>
                                                <span data-kt-element="lang-name">English</span>
                                            </a>
                                        @endif
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Languages-->
        
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                
                <!--end::Form-->

                <!--begin::Footer-->
                    
                <!--end::Footer-->
            </div>
            <!--end::Body-->

            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ image('misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-2 py-lg-5 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="{{ route('dashboard') }}">
                        <img alt="Logo" src="{{ image('logos/logo_white.png') }}" class="h-100px h-lg-175px"/>
                    </a>
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-175px w-md-50 mb-10 mb-lg-10" src="{{ image('illustrations/sketchy-1/10.png') }}" alt=""/>
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        {{ __('admin/app.general.slogan_title') }}
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">{{ __('admin/app.general.slogan_text') }}</div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Wrapper-->
        
    </div>
    <!--end::App-->

@endsection
