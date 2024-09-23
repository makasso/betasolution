<div class="modal modal-xl fade" id="kt_modal_add_company" tabindex="-1" aria-modal="true" role="dialog"
     wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog  modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>{{ __('admin/app.menu.company_create') }}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-row flex-xl-row flex-row-fluid first"
                     id="kt_modal_create_app_stepper" data-kt-stepper="true">
                    <!--begin::Aside-->
                    <div
                        class="d-flex justify-content-center justify-content-xl-start  flex-row-auto w-100 w-xl-300px">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10 ">
                            <!--begin::Step 1-->
                            <div class="stepper-item current mb-5" data-kt-stepper-element="nav">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-solid ki-check stepper-check fs-2"></i> <span
                                            class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->

                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('admin/app.menu.company_create') }}
                                        </h3>
                                        <div class="stepper-desc">
                                        </div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item pending" data-kt-stepper-element="nav">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-solid ki-check stepper-check fs-2"></i> <span
                                            class="stepper-number">2</span>
                                    </div>
                                    <!--begin::Icon-->

                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('admin/app.menu.employee_create') }}
                                        </h3>

                                        <div class="stepper-desc">

                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 2-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid  px-lg-15">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                              id="kt_modal_create_app_form" data-gtm-form-interact-id="0">
                            <!--begin::Step 1-->
                            <div data-kt-stepper-element="content" class="current">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.name') }}</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="lname"
                                                           class="form-control form-control-lg form-control-solid">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Email') }}</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" name="company"
                                                   class="form-control form-control-lg form-control-solid">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span
                                                class="required">{{ __('admin/app.general.company_table.phone') }}</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="tel" name="phone"
                                                   class="form-control form-control-lg form-control-solid">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span
                                                class="required">{{ __('admin/app.general.company_table.industry') }}</span></label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <select name="country" id="select-industry" data-control="select2"
                                                    data-placeholder="{{ __('admin/app.general.company_table.industry') }}..."
                                                    class="form-select form-select-solid form-select-lg fw-semibold"
                                                    tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option></option>
                                                @foreach($industries as $industry)
                                                    <option
                                                        value="{{$industry->id}}">{{ app()->getLocale() == 'fr' ? $industry->name_fr : $industry->name_en }}</option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span
                                                class="required">{{ __('admin/app.general.company_table.country') }}</span></label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <select name="country" id="select-country" data-control="select2"
                                                    data-placeholder="{{ __('admin/app.general.company_table.country') }}..."
                                                    class="form-select form-select-solid form-select-lg fw-semibold"
                                                    tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option></option>
                                                @foreach($flags as $flag)
                                                    <option value="{{ $flag['name'] }}"
                                                            data-kt-select2-country="{{ image("flags/{$flag['file']}") }}">
                                                        {{ $flag['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.city') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="city"
                                                           class="form-control form-control-lg form-control-solid">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.address') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="address"
                                                           class="form-control form-control-lg form-control-solid">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-0">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label fw-semibold fs-6 required">{{ __('admin/app.general.company_table.status') }}</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <div
                                                class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                <input class="form-check-input w-45px h-30px" type="checkbox"
                                                       id="status" checked="">
                                                <label class="form-check-label" for="status"></label>
                                            </div>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="pending" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="lname"
                                                           class="form-control form-control-lg form-control-solid">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Email') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" name="company"
                                                   class="form-control form-control-lg form-control-solid">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span
                                                class="required">{{ __('admin/app.general.company_table.phone') }}</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="tel" name="phone"
                                                   class="form-control form-control-lg form-control-solid">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button wire:click="stepDown" type="button" class="btn btn-lg btn-light-primary me-3 {{ $currentStep === 1 ? 'd-none' : '' }}"
                                            data-kt-stepper-action="previous">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1"><span
                                                class="path1"></span><span
                                                class="path2"></span></i> {{ __('admin/app.general.back') }}
                                    </button>
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit"  class="btn btn-primary {{ $currentStep === 2 ? '' : 'd-none' }}" data-kt-users-modal-action="submit">
                                        <span class="indicator-label"
                                              wire:loading.remove>{{ $edit_mode ? __('admin/app.general.edit') : __('admin/app.general.create') }}</span>
                                        <span class="indicator-progress" wire:loading wire:target="submit">
                                {{ __('admin/app.general.loading') }}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                                    </button>
                                    <button wire:click="stepUp" type="button" class="btn btn-lg btn-primary {{ $currentStep === 2 ? 'd-none' : '' }}"
                                            data-kt-stepper-action="next">
                                        {{ __('admin/app.general.continue') }}
                                        <i class="ki-solid ki-arrow-right fs-3 ms-1 me-0"></i>
                                    </button>

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('scripts')
    <script>
        $('#select-industry').select2();
        var optionFormat = function (item) {
            if (!item.id) {
                return item.text;
            }

            var span = document.createElement('span');
            var imgUrl = item.element.getAttribute('data-kt-select2-country');
            var template = '';

            template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#select-country').select2({
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    </script>
@endpush
