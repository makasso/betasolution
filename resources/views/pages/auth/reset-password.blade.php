<x-auth-layout>
    @section('title')
        {{ __('admin/app.auth_page.reset_password') }}
    @endsection
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->token }}">
        <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                {{ __('admin/app.auth_page.new_password') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                {{ __('admin/app.auth_page.enter_new_password') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="{{ __('admin/app.auth_page.password') }}" name="password" autocomplete="off"/>

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                {{ __('admin/app.auth_page.new_password_pattern') }}
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group--->

        <!--end::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="{{ __('admin/app.auth_page.password_confirmation') }}" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_new_password_submit" class="btn btn-primary me-4">
                @include('partials/general/_button-indicator', ['label' => trans('admin/app.auth_page.reset_password')])
            </button>

            <a href="{{ route('login') }}" class="btn btn-light">{{ __('admin/app.general.cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->

    @push('scripts')
        <script>
            "use strict";

            // Class Definition
            var KTAuthNewPassword = function() {
                // Elements
                var form;
                var submitButton;
                var validator;
                var passwordMeter;

                var handleForm = function(e) {
                    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                    validator = FormValidation.formValidation(
                        form,
                        {
                            fields: {
                                'password': {
                                    validators: {
                                        notEmpty: {
                                            message: '{{ __('validation.required', ['attribute' => strtolower(trans('admin/app.auth_page.password'))]) }}'
                                        },
                                        callback: {
                                            message: '{{ __('validation.not_regex', ['attribute' => strtolower(trans('admin/app.auth_page.password'))]) }}',
                                            callback: function(input) {
                                                if (input.value.length > 0) {
                                                    return validatePassword();
                                                }
                                            }
                                        }
                                    }
                                },
                                'confirm-password': {
                                    validators: {
                                        notEmpty: {
                                            message: '{{ __('validation.required', ['attribute' => strtolower(trans('admin/app.auth_page.password_confirmation'))]) }}'
                                        },
                                        identical: {
                                            compare: function() {
                                                return form.querySelector('[name="password"]').value;
                                            },
                                            message: '{{ __('validation.confirmed') }}'
                                        }
                                    }
                                },
                                'toc': {
                                    validators: {
                                        notEmpty: {
                                            message: 'You must accept the terms and conditions'
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger({
                                    event: {
                                        password: false
                                    }
                                }),
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: '.fv-row',
                                    eleInvalidClass: '',  // comment to enable invalid state icons
                                    eleValidClass: '' // comment to enable valid state icons
                                })
                            }
                        }
                    );

                    form.querySelector('input[name="password"]').addEventListener('input', function() {
                        if (this.value.length > 0) {
                            validator.updateFieldStatus('password', 'NotValidated');
                        }
                    });
                }


                var handleSubmitDemo = function (e) {
                    submitButton.addEventListener('click', function (e) {
                        e.preventDefault();

                        validator.revalidateField('password');

                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                // Simulate ajax request
                                setTimeout(function() {
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                    Swal.fire({
                                        text: "{{ __('passwords.reset') }}",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            form.querySelector('[name="password"]').value= "";
                                            form.querySelector('[name="confirm-password"]').value= "";
                                            passwordMeter.reset();  // reset password meter
                                            //form.submit();

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

                        validator.revalidateField('password');

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

                                        const redirectUrl = form.getAttribute('data-kt-redirect-url');

                                        if (redirectUrl) {
                                            setTimeout(() => {
                                                location.href = redirectUrl;
                                            }, 1500)
                                        }
                                    } else {
                                        // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                        Swal.fire({
                                            text: "{{ __('validation.email', ['attribute' => 'email']) }}",
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
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    });
                }

                var validatePassword = function() {
                    return  (passwordMeter.getScore() > 50);
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
                    init: function() {
                        form = document.querySelector('#kt_new_password_form');
                        submitButton = document.querySelector('#kt_new_password_submit');
                        passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

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
            KTUtil.onDOMContentLoaded(function() {
                KTAuthNewPassword.init();
            });

        </script>
    @endpush

</x-auth-layout>
