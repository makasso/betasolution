<x-auth-layout>
    @section('title')
        {{ __('admin/app.auth_page.forgot_password') }}
    @endsection
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('password.request') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                {{ __('admin/app.auth_page.forgot_password') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                {{ __('admin/app.auth_page.forgot_password_text') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="{{ __('admin/app.auth_page.email') }}" name="email" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Email-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials/general/_button-indicator', ['label' => trans('admin/app.auth_page.send_link')])
            </button>

            <a href="{{ route('login') }}" class="btn btn-light">{{ __('admin/app.general.cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->

    @push('scripts')
        <script>
            "use strict";

            let myForm = document.querySelector('#kt_password_reset_form');
            myForm.addEventListener('keydown', function(event) {
                if(event.key === 'Enter') {
                    event.preventDefault();
                }
            });
            // Class Definition
            var KTAuthResetPassword = function () {
                // Elements
                var form;
                var submitButton;
                var validator;

                var handleForm = function (e) {
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
                    submitButton.addEventListener('click', function (e) {
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
                                        text: "{{ __('admin/app.auth_page.forgot_password_mail_sent') }}",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            form.querySelector('[name="email"]').value = "";
                                            //form.submit();

                                            var redirectUrl = form.getAttribute('data-kt-redirect-url');
                                            if (redirectUrl) {
                                                location.href = redirectUrl;
                                            }
                                        }
                                    });
                                }, 2500);
                            } else {
                                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                Swal.fire({
                                    text: "{{ __('admin/app.general.error') }}",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
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
                                            text: "{{ __('admin/app.auth_page.forgot_password_mail_sent') }}",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok",
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
                                            text: "{{ __('validation.email', ['attribute' => 'email']) }}",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                }).catch(function (error) {
                                    Swal.fire({
                                        text: "{{ __('admin/app.auth_page.invalid_credentials') }}",
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
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    });
                }

                var isValidUrl = function(url) {
                    try {
                        new URL(url);
                        return true;
                    } catch (e) {
                        return false;
                    }
                }

                // Public Functions
                return {
                    // public functions
                    init: function () {
                        form = document.querySelector('#kt_password_reset_form');
                        submitButton = document.querySelector('#kt_password_reset_submit');

                        handleForm();

                        if (isValidUrl(form.getAttribute('action'))) {
                            handleSubmitAjax(); // use for ajax submit
                        } else {
                            handleSubmitDemo(); // used for demo purposes only
                        }
                    }
                };
            }();

            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                KTAuthResetPassword.init();
            });

        </script>
    @endpush

</x-auth-layout>
