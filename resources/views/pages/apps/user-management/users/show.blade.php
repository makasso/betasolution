<x-default-layout>

    @section('title')
        {{ __('admin/app.menu.user') }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.users.show', $user) }}
    @endsection

    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if($user->profile_photo_url)
                                <img src="{{ $user->profile_photo_url }}" alt="image"/>
                            @else
                                <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $user->name) }}">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            @foreach($user->roles as $role)
                                <!--begin::Badge-->
                                <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($role->name) }}</div>
                                <!--begin::Badge-->
                            @endforeach
                        </div>
                        <!--end::Position-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                       {{-- <div class="fw-bold mb-3">Assigned Tickets
                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week.">
                                <i class="ki-solid ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </div>--}}
                        <!--end::Info heading-->
                       {{-- <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-75px">243</span>
                                    <i class="ki-solid ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Total</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">56</span>
                                    <i class="ki-solid ki-arrow-down fs-3 text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Solved</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">188</span>
                                    <i class="ki-solid ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Open</div>
                            </div>
                            <!--end::Stats-->
                        </div>--}}
                        <!--end::Info-->
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                            <span class="ms-2 rotate-180">
                                <i class="ki-solid ki-down fs-3"></i>
                            </span>
                        </div>
{{--                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="{{ __('admin/app.menu.user_edit') }}">--}}
{{--                            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">{{ __('admin/app.general.edit') }}</a>--}}
{{--                        </span>--}}
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">{{ config('app.name') }} ID</div>
                            <div class="text-gray-600">ID-{{$user->id}}</div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                            </div>
                            <!--begin::Details item-->
                           {{-- <!--begin::Details item-->
                            <div class="fw-bold mt-5">Address</div>
                            <div class="text-gray-600">101 Collin Street,
                                <br />Melbourne 3000 VIC
                                <br />Australia
                            </div>
                            <!--begin::Details item-->--}}
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">{{ __('admin/app.app_header.language') }}</div>
                            <div class="text-gray-600">{{ app()->getLocale() == 'fr' ? 'Français' : 'English' }}</div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">{{ __('admin/app.general.users_table.last_login') }}</div>
                            <div class="text-gray-600">{{ is_null($user->last_login) ? $user->created_at->diffForHumans() : $user->last_login_at->diffForHumans()}}</div>
                            <!--begin::Details item-->
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin::Card-->
            <div class="card pt-4 mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ __('admin/app.general.login_sessions') }}</h2>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <tr class="text-start text-muted text-uppercase gs-0">
                                <th class="min-w-100px">{{ __('admin/app.general.location') }}</th>
                                <th>{{ __('admin/app.general.device') }}</th>
                                <th>{{ __('admin/app.general.ip_address') }}</th>
                                <th>{{ __('Action') }}</th>
                                <th class="min-w-125px">{{ __('admin/app.general.time') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fs-6 fw-semibold text-gray-600">
                            @forelse($session_histories as $h)
                                <tr>
                                    <td>{{ $h->location }}</td>
                                    <td>{{ $h->user_agent }}</td>
                                    <td>{{ $h->ip_address }}</td>
                                    <td><span class="badge  badge-light-success">{{ $h->action }}</span></td>
                                    <td>{{ $h->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">{{ __('admin/app.general.no_data_found') }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
    <!--begin::Modals-->
{{--        <livewire:admin.user.update-user-modal></livewire:admin.user.update-user-modal>--}}
    <!--begin::Modal - Update user details-->
{{--    @include('pages/apps/user-management/users/modals/_update-details')--}}
    <!--end::Modal - Update user details-->
    <!--begin::Modal - Add schedule-->
{{--    @include('pages/apps/user-management/users/modals/_add-schedule')--}}
{{--    <!--end::Modal - Add schedule-->--}}
{{--    <!--begin::Modal - Add one time password-->--}}
{{--    @include('pages/apps/user-management/users/modals/_add-one-time-password')--}}
{{--    <!--end::Modal - Add one time password-->--}}
{{--    <!--begin::Modal - Update email-->--}}
{{--    @include('pages/apps/user-management/users/modals/_update-email')--}}
{{--    <!--end::Modal - Update email-->--}}
{{--    <!--begin::Modal - Update password-->--}}
{{--    @include('pages/apps/user-management/users/modals/_update-password')--}}
{{--    <!--end::Modal - Update password-->--}}
{{--    <!--begin::Modal - Update role-->--}}
{{--    @include('pages/apps/user-management/users/modals/_update-role')--}}
{{--    <!--end::Modal - Update role-->--}}
{{--    <!--begin::Modal - Add auth app-->--}}
{{--    @include('pages/apps/user-management/users/modals/_add-auth-app')--}}
{{--    <!--end::Modal - Add auth app-->--}}
{{--    <!--begin::Modal - Add task-->--}}
{{--    @include('pages/apps/user-management/users/modals/_add-task')--}}
    <!--end::Modal - Add task-->
    <!--end::Modals-->
</x-default-layout>
