<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
				<!--begin:Menu link-->
				<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
					<span class="menu-bullet">
						<span class="ki-solid ki-home"></span>
					</span>
					<span class="menu-title">{{ __('admin/app.menu.dashboard') }}</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
            @role('super admin')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user-management.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
					<span class="menu-title">{{ __('admin/app.menu.user_management') }}</span>
					<span class="menu-arrow"></span>
				</span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}" href="{{ route('user-management.users.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                            <span class="menu-title">{{ __('admin/app.menu.user') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}" href="{{ route('user-management.roles.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                            <span class="menu-title">{{ __('admin/app.menu.role') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}" href="{{ route('user-management.permissions.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                            <span class="menu-title">{{ __('admin/app.menu.permission') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endrole
			<!--end:Menu item-->
            <!--begin:Menu item-->
            @role('super admin')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('course-management.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('book-open', 'fs-2') !!}</span>
					<span class="menu-title">{{ __('admin/app.menu.course_management') }}</span>
					<span class="menu-arrow"></span>
				</span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('course-management.courses.*') ? 'active' : '' }}" href="{{ route('course-management.courses.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                            <span class="menu-title">{{ __('admin/app.menu.course') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('course-management.categories.*') ? 'active' : '' }}" href="{{ route('course-management.categories.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                            <span class="menu-title">{{ __('admin/app.menu.category') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->routeIs('companies.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <a class="menu-link {{ request()->routeIs('companies.index') ? 'active' : '' }}" href="{{ route('companies.index') }}">
					<span class="menu-bullet">
						<span class="ki-solid ki-people"></span>
					</span>
                    <span class="menu-title">{{ __('admin/app.menu.company') }}</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            @endrole
            <!--end:Menu item-->
		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
