<x-default-layout>
    @section('title')
        {{ __('admin/app.menu.company_create') }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('company-management.companies.create') }}
    @endsection
        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="/metronic8/demo1/apps/ecommerce/catalog/products.html">
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2" role="tablist">
                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#company-create" aria-selected="true" role="tab">{{ __('admin/app.menu.company_create') }}</a>
                    </li>
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#employee-create" aria-selected="false" role="tab" tabindex="-1">{{ __('admin/app.menu.employee_create') }}</a>
                    </li>
                    <!--end:::Tab item-->

                </ul>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade active show" id="company-create" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">{{ __('admin/app.menu.company_create') }}</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->

                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show" data-select2-id="select2-data-kt_account_settings_profile_details">
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.name') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="lname" class="form-control form-control-lg form-control-solid">
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
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
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Email') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="company" class="form-control form-control-lg form-control-solid">
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">{{ __('admin/app.general.company_table.phone') }}</span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="tel" name="phone" class="form-control form-control-lg form-control-solid">
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">{{ __('admin/app.general.company_table.industry') }}</span></label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <select name="country" id="select-industry" data-control="select2" data-placeholder="{{ __('admin/app.general.company_table.industry') }}..." class="form-select form-select-solid form-select-lg fw-semibold" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    <option></option>
                                                    @foreach($industries as $industry)
                                                        <option value="{{$industry->id}}">{{ app()->getLocale() == 'fr' ? $industry->name_fr : $industry->name_en }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">{{ __('admin/app.general.company_table.country') }}</span></label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <select name="country" id="select-country" data-control="select2" data-placeholder="{{ __('admin/app.general.company_table.country') }}..." class="form-select form-select-solid form-select-lg fw-semibold" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    <option></option>
                                                    @foreach($flags as $flag)
                                                        <option value="{{ $flag['name'] }}" data-kt-select2-country="{{ image("flags/{$flag['file']}") }}">
                                                            {{ $flag['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.city') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="city" class="form-control form-control-lg form-control-solid">
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
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
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.address') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="address" class="form-control form-control-lg form-control-solid">
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
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
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6 required">{{ __('admin/app.general.company_table.status') }}</label>
                                            <!--begin::Label-->

                                            <!--begin::Label-->
                                            <div class="col-lg-8 d-flex align-items-center">
                                                <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="status" checked="">
                                                    <label class="form-check-label" for="status"></label>
                                                </div>
                                            </div>
                                            <!--begin::Label-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--end::Form-->
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="employee-create" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">{{ __('admin/app.menu.employee_create') }}</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->

                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show" data-select2-id="select2-data-kt_account_settings_profile_details">
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('admin/app.general.company_table.name') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="lname" class="form-control form-control-lg form-control-solid">
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
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
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Email') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="company" class="form-control form-control-lg form-control-solid">
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">{{ __('admin/app.general.company_table.phone') }}</span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="tel" name="phone" class="form-control form-control-lg form-control-solid">
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Card body-->
                                    <!--end::Form-->
                                </div>
                                <!--end::Content-->

                            </div>
                        </div>
                    </div>
                    <!--end::Tab pane-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{ __('admin/app.general.create') }}</button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Main column-->
        </form>

    @push('scripts')
            <script>
                $('#select-industry').select2();
                var optionFormat = function(item) {
                    if ( !item.id ) {
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

</x-default-layout>
