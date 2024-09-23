<x-auth-layout>
    @section('title')
        {{ __('admin/app.auth_page.signin') }}
    @endsection
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
          data-kt-redirect-url="{{ route('dashboard') }}" action="{{ route('login') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                {{ __('admin/app.auth_page.signin') }}
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                {{ config('app.name') }}
            </div>
            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="{{ __('admin/app.auth_page.email') }}" name="email" autocomplete="off"
                   class="form-control bg-transparent" value=""/>
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="{{ __('admin/app.auth_page.password') }}" name="password"
                   autocomplete="off" class="form-control bg-transparent" value=""/>
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="{{ route('password.request') }}" class="link-primary">
                {{ __('admin/app.auth_page.forgot_password') }}
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => trans('admin/app.auth_page.signin') ])
            </button>
        </div>
        <!--end::Submit button-->


    </form>
    <!--end::Form-->
    @push('scripts')
        <script>
            "use strict";

            // Class definition
            var KTSigninGeneral = function () {
                // Elements
                var form;
                var submitButton;
                var validator;

                // Handle form
                var handleValidation = function (e) {
                    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                    validator = FormValidation.formValidation(
                        form,
                        {
                            fields: {
                                'email': {
                                    validators: {
                                        regexp: {
                                            regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                            message: '{{ __('validation.email', ['attribute' => 'email' ]) }}',
                                        },
                                        notEmpty: {
                                            message: '{{ __('validation.required', ['attribute' => 'email']) }}'
                                        }
                                    }
                                },
                                'password': {
                                    validators: {
                                        notEmpty: {
                                            message: '{{ __('validation.required', ['attribute' => strtolower(trans('admin/app.auth_page.password'))]) }}'
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: '.fv-row',
                                    eleInvalidClass: '',  // comment to enable invalid state icons
                                    eleValidClass: '' // comment to enable valid state icons
                                })
                            }
                        }
                    );
                }

                var handleSubmitDemo = function (e) {
                    // Handle form submit
                    submitButton.addEventListener('click', function (e) {
                        // Prevent button default action
                        e.preventDefault();

                        // Validate form
                        validator.validate().then(function (status) {
                            if (status == 'Valid') {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;


                                // Simulate ajax request
                                setTimeout(function () {
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                    Swal.fire({
                                        text: "{{ __('admin/app.auth_page.login_successful') }}",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "{{ __('OK') }}",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            form.querySelector('[name="email"]').value = "";
                                            form.querySelector('[name="password"]').value = "";

                                            //form.submit(); // submit form
                                            var redirectUrl = form.getAttribute('data-kt-redirect-url');
                                            if (redirectUrl) {
                                                location.href = redirectUrl;
                                            }
                                        }
                                    });
                                }, 2000);
                            } else {
                                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                Swal.fire({
                                    text: "{{ __('admin/app.auth_page.invalid_credentials') }}",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('OK') }}",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    });
                }

                var handleSubmitAjax = function (e) {
                    // Handle form submit
                    submitButton.addEventListener('click', function (e) {
                        // Prevent button default action
                        e.preventDefault();

                        // Validate form
                        validator.validate().then(function (status) {
                            if (status == 'Valid') {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                // Check axios library docs: https://axios-http.com/docs/intro
                                axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {
                                    if (response) {
                                        form.reset();

                                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                        Swal.fire({
                                            text: "{{ __('admin/app.auth_page.login_successful') }}",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "OK",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });

                                        const redirectUrl = form.getAttribute('data-kt-redirect-url');

                                        if (redirectUrl) {
                                            location.href = redirectUrl;
                                        }
                                    } else {
                                        // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                        Swal.fire({
                                            text: "{{ __('admin/app.auth_page.invalid_credentials') }}",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "OK",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                }).catch(function (error) {
                                    Swal.fire({
                                        text: "{{ __('admin/app.general.error') }}",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }).then(() => {
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;
                                });
                            } else {
                                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                Swal.fire({
                                    text: "{{ __('admin/app.general.error') }}",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('OK') }}",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    });
                }

                var isValidUrl = function (url) {
                    try {
                        new URL(url);
                        return true;
                    } catch (e) {
                        return false;
                    }
                }

                // Public functions
                return {
                    // Initialization
                    init: function () {
                        form = document.querySelector('#kt_sign_in_form');
                        submitButton = document.querySelector('#kt_sign_in_submit');

                        handleValidation();

                        if (isValidUrl(submitButton.closest('form').getAttribute('action'))) {
                            handleSubmitAjax(); // use for ajax submit
                        } else {
                            handleSubmitDemo(); // used for demo purposes only
                        }
                    }
                };
            }();

            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                KTSigninGeneral.init();
            });

        </script>
    @endpush
</x-auth-layout>
