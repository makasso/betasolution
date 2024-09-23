<x-default-layout>

    @section('title')
        {{ __('admin/app.menu.user') }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.users.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('admin/app.general.search') . ' ' .  __('admin/app.menu.user') }} " id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        {{ __('admin/app.menu.user_create') }}
                    </button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:admin.user.add-user-modal></livewire:admin.user.add-user-modal>
                <!--end::Modal-->
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
        <livewire:admin.user.update-user-modal></livewire:admin.user.update-user-modal>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['users-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['users-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_user').on('hidden.bs.modal', function () {
                Livewire.dispatch('new_user');
            });
        </script>

            <script>
                // Initialize KTMenu
                KTMenu.init();

                // Add click event listener to delete buttons
                document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
                    element.addEventListener('click', function () {
                        Swal.fire({
                            text: '{{ __('admin/app.general.delete_confirmation') }}',
                            icon: 'warning',
                            buttonsStyling: false,
                            showCancelButton: true,
                            confirmButtonText: '{{ __('admin/app.general.confirm') }}',
                            cancelButtonText: '{{ __('admin/app.general.cancel') }}',
                            customClass: {
                                confirmButton: 'btn btn-danger',
                                cancelButton: 'btn btn-secondary',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Livewire.dispatch('delete_user', [this.getAttribute('data-kt-user-id')]);
                            }
                        });
                    });
                });

                // Add click event listener to update buttons
                document.querySelectorAll('[data-kt-action="update_row"]').forEach(function (element) {
                    element.addEventListener('click', function () {
                        Livewire.dispatch('update_user', [this.getAttribute('data-kt-user-id')]);
                    });
                });

                // Listen for 'success' event emitted by Livewire
                Livewire.on('success', (message) => {
                    // Reload the users-table datatable
                    LaravelDataTables['users-table'].ajax.reload();
                });

            </script>
    @endpush

</x-default-layout>
