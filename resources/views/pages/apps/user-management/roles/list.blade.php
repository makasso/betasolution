<x-default-layout>

    @section('title')
        Roles
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.roles.index') }}
    @endsection

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <livewire:admin.permission.role-list></livewire:admin.permission.role-list>
    </div>
    <!--end::Content container-->

    <!--begin::Modal-->
    <livewire:admin.permission.role-modal></livewire:admin.permission.role-modal>
    <!--end::Modal-->

</x-default-layout>
