<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
            Admin
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{Route::currentRouteName() == 'admin.companies.index'?'active':''}}">
            <a href="{{route('admin.companies.index')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-buildings"></i>
            <div data-i18n="Tables">Companies</div>
            </a>
        </li>
        <li class="menu-item {{Route::currentRouteName() == 'admin.employees.index'?'active':''}}">
            <a href="{{route('admin.employees.index')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-hive"></i>
            <div data-i18n="Tables">Employees</div>
            </a>
        </li>
    </ul>
</aside>