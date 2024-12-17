
<div class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo mt-3 px-5" id="kt_aside_logo">
        <a href="{{ asset('admin/media/our-image/logo.png') }}">
            {{-- <img alt="Logo" src="{{ asset('admin/media/our-image/logo.png') }}"
                class="w-200px h-70px aside-logo-default" /> --}}
            {{-- <img alt="minimize" src="{{ asset('admin/media/our-image/logo.png') }}"
                class="w-200px h-70px img-fluid aside-logo-minimize" /> --}}
        </a>
    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu aside-toolbar menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                    <div class="symbol symbol-50px">
                        <img src="{{ asset('admin/media/avatars/300-1.jpg') }}" alt="" />
                    </div>
                    <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                        <div class="d-flex">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ auth()->user()->name }}</a>
                                <span class="text-gray-600 fw-semibold d-block fs-8 mb-1">{{ auth()->user()->email }}</span>
                                <div class="d-flex align-items-center text-success fs-9">
                                <span class="bullet bullet-dot bg-success me-1"></span>online</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->can('view_home')) 
                    <div class="menu-item">
                        <a class="menu-link {{ $is_active == 'home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.876" height="23.778"
                                        viewBox="0 0 22.876 23.778">
                                        <g id="Iconly_Curved_Home" data-name="Iconly/Curved/Home"
                                            transform="translate(1 1)">
                                            <g id="Home">
                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,.549H3.057"
                                                    transform="translate(9.275 14.896)" fill="none" stroke="#fff"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                    stroke-width="2" />
                                                <path id="Stroke_2" data-name="Stroke 2"
                                                    d="M0,12.754c0-6.132.669-5.7,4.267-9.041C5.842,2.446,8.292,0,10.408,0s4.614,2.434,6.2,3.713c3.6,3.337,4.266,2.91,4.266,9.041,0,9.024-2.133,9.024-10.438,9.024S0,21.778,0,12.754Z"
                                                    fill="none" stroke="#fff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('admin.menu.home') }}</span>
                        </a>
                    </div>
                @endif
                @if(auth()->user()->can('view_categories')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'categories' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.categories.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.categories') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_courses')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'courses' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.courses.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.courses') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_lessons')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'lessons' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.lessons.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.lessons') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_admins')) 
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ $is_active_parent == 'user_management' ? 'here show' : '' }}">
                        <span class="menu-link menu-accordion">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">ادارة المستخدمين</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ $is_active == 'admins' ? 'active' : '' }}"
                                    href="{{ route('admin.admins.index')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.menu.admins') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ $is_active == 'instructors' ? 'active' : '' }}"
                                    href="{{ route('admin.instructors.index')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.menu.instructors') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ $is_active == 'students' ? 'active' : '' }}"
                                    href="{{ route('admin.students.index')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('admin.menu.students') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->can('view_roles')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'roles' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.roles.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.roles') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_payment_ways')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'payment_ways' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.payment_ways.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.payment_ways') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                <div class="menu-item menu-accordion {{ $is_active_parent == 'pages' ? 'here show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-font-awesome"></i>
                            </span>
                        </span>
                        <span class="menu-title">
                            <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                href="{{ route('admin.pages.index')}}">
                                <span class="menu-title">{{ __('admin.menu.pages') }}</span>
                            </a>    
                        </span>                        
                    </span>
                </div>
                @if(auth()->user()->can('view_reviews')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'reviews' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.reviews.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.reviews') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_sliders')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'sliders' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.sliders.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.sliders') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_guest_questions')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'guest_questions' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.guest_questions.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.guest_questions') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_orders')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'orders' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.orders.index')}}">
                                    <span class="menu-title">{{ __('admin.menu.orders') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                @if(auth()->user()->can('view_settings')) 
                    <div class="menu-item menu-accordion {{ $is_active_parent == 'settings' ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa-solid fa-font-awesome"></i>
                                </span>
                            </span>
                            <span class="menu-title">
                                <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                    href="{{ route('admin.settings.index')}}">
                                    <span class="menu-title">{{ __('admin.form.settings') }}</span>
                                </a>    
                            </span>                        
                        </span>
                    </div>
                @endif
                {{-- <div class="menu-item menu-accordion {{ $is_active_parent == 'logout' ? 'here show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-font-awesome"></i>
                            </span>
                        </span>
                        <span class="menu-title">
                            <a class="{{ $is_active == 'logout' ? 'active' : '' }}"
                                href="aaaaa.logout.index')}}">
                                <span class="menu-title">{{ __('admin.menu.logout') }}</span>
                            </a>    
                        </span>                        
                    </span>
                </div> --}}
            </div>
        </div>
    </div>
</div>
