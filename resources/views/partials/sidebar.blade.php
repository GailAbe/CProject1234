<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="{{ route('home') }}" class="brand-logo">
            <img alt="Logo" class="w-100px" src="{{ asset('z2.png') }}" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item {{ !request()->routeIs('home.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('home') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-chart-line"></i>
                        <span class="menu-text">DASHBOARD</span>
                    </a>
                </li>
                <li class="menu-item  {{ !request()->routeIs('household.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('household.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-home"></i>
                        <span class="menu-text">HOUSEHOLD</span>
                    </a>
                </li>
                <li class="menu-item  {{ !request()->routeIs('complaint.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('complaint.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-balance-scale"></i>
                        <span class="menu-text">COMPLAINT</span>
                    </a>
                </li>
                <li class="menu-item  {{ !request()->routeIs('incident.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('incident.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-exclamation-triangle"></i>
                        <span class="menu-text">INCIDENTS</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('official.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('official.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-users"></i>
                        <span class="menu-text">OFFICIALS</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('trashbin.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('trashbin.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-trash"></i>
                        <span class="menu-text text-nowrap">TRASH BIN</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
