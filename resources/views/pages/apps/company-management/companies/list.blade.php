<x-default-layout>

    @section('title')
        {{ __('admin/app.menu.company') }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('company-management.companies.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13"
                           placeholder="{{ __('admin/app.general.search') . ' ' .  __('admin/app.menu.company') }} "
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_add_company" class="btn btn-primary">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        {{ __('admin/app.menu.company_create') }}
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->


            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--begin::Modal-->
    <livewire:admin.company.add-company-modal></livewire:admin.company.add-company-modal>
    <!--end::Modal-->
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['companies-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_company').modal('hide');
                    window.LaravelDataTables['companies-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_company').on('hidden.bs.modal', function () {
                Livewire.dispatch('new_company');
            });
        </script>

    @endpush

</x-default-layout>
