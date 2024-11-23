<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100"
    @if (app_setting()->rtl_ltr == 1) dir="ltr" @else dir="rtl" @endif>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="floating_number" content="{{ app_setting()->floating_number }}" />
    <meta name="negative_amount_symbol" content="{{ app_setting()->negative_amount_symbol }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ app_setting()->title }}">
    <meta name="author" content="{{ app_setting()->title }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="get-localization-strings" content="{{ route('get-localization-strings') }}">
    <meta name="default-localization" content="{{ app_setting()->lang?->value }}">
    <title>@yield('title')</title>
    <!-- App favicon -->

    <link rel="shortcut icon" class="favicon_show" href="{{ app_setting()->favicon }}">
    @include('backend.layouts.assets.css')
    @stack('css')
</head>

<body class="fixed sidebar-mini @yield('body-class')">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>{{ localize('please_wait') }}</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <div class="wrapper">
        @include('backend.layouts.sidebar')
        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                <!--Navbar-->
                <nav class="navbar-custom-menu navbar navbar-expand-xl m-0">
                    <div class="sidebar-toggle-icon" id="sidebarCollapse">sidebar toggle<span></span></div>
                    <!--/.sidebar toggle icon-->
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Toggler -->
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbar-collapse" aria-expanded="true"
                            aria-label="Toggle navigation"><span></span> <span></span></button>
                        
                    </div>
                    <div class="navbar-icon d-flex">
                        <ul class="navbar-nav flex-row gap-3 align-items-center">
                            <!--/.dropdown-->
                            
                            <li class="nav-item dropdown user-menu">
                                <a class="dropdown-toggle admin-btn me-2 me-sm-3 me-xl-0" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="admin-img me-1 me-sm-2"
                                        src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('backend/assets/dist/img/avatar.jpg') }}"
                                        alt="{{ localize('profile_picture') }}" />
                                    <span
                                        class="fw-bold fs-15 lh-sm text-start d-none d-md-block">{{ auth()->user() ? ucwords(auth()->user()->full_name) : '' }}<br />
                                        <span
                                            class="fs-12">{{ auth()->user()->user_type_id == 1 ? 'Admin' : 'Staff' }}</span></span>
                                </a>
                                <div class="dropdown-menu new-dropdown shadow">
                                    <div class="dropdown-header d-sm-none">
                                        <a href="" class="header-arrow"><i
                                                class="icon ion-md-arrow-back"></i></a>
                                    </div>
                                    <div class="user-header">
                                        <div class="img-user">
                                            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('backend/assets/dist/img/avatar.jpg') }}"
                                                alt="{{ localize('profile_picture') }}" />
                                        </div>
                                        <!-- img-user -->
                                        <h6>{{ auth()->user() ? ucwords(auth()->user()->full_name) : '' }}</h6>
                                        <span>{{ auth()->user() ? auth()->user()->email : '' }}</span>
                                    </div>
                                    <!-- user-header -->
                                    <div class="mb-3 text-center">
                                        <a href="{{ route('empProfile') }}" class="color_1 fs-16">{{localize('manage_your_account')}}</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="bg-smoke text-black rounded-3 px-3 py-2">{{ localize('sign_out') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <button class="btn bg-smoke text-danger rounded-3 px-3 py-2">Close</button>
                                    </div>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>
                        </ul>
                        <!--/.navbar nav-->
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="typcn typcn-th-menu-outline"></i>
                    </button>
                </nav>
                <!--/.navbar-->
                <div class="body-content">
                    {{-- <div class="tile"> --}}

                    @yield('content')

                    {{-- </div> --}}
                </div>
                <!--/.body content-->
            </div>
            <!--/.main content-->
            <?php // @include('backend.layouts.footer') ?>
            <input type="hidden" id="base_url" value="{{ url('') }}">
            <!--/.footer content-->
            <div class="overlay"></div>
        </div>
        <!--/.wrapper-->
    </div>
    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfile" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> {{ localize('update_profile_information') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="userProfileUpdate" action="{{ route('profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label>{{ localize('full_name') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="full_name" id="full_name" class="form-control"
                                            value="{{ Auth::user()->full_name }}">
                                        <span class="text-danger error_full_name"></span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>{{ localize('contact_no') }}<span class="text-danger">*</span></label>
                                        <input type="number" name="contact_no" id="contact_no" class="form-control"
                                            value="{{ Auth::user()->contact_no }}">
                                        <span class="text-danger error_contact_no"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="profilePictureUpload" class="label-upload">
                                                <div class="avatar-upload">
                                                    <input type="file" id="profilePictureUpload"
                                                        name="profile_image" class="txt-file">
                                                    <div class="avatar-preview">
                                                        <div id="profilePicturePreview"
                                                            style="background-image: url({{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('backend/assets/dist/img/avatar.jpg') }})">
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                            <label>{{ localize('profile_picture') }}</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="signatureUpload" class="label-upload">
                                                <div class="avatar-upload">
                                                    <input type="file" id="signatureUpload" name="signature"
                                                        class="txt-file">
                                                    <div class="signature-preview">
                                                        <div id="signaturePreview"
                                                            style="background-image: url({{ Auth::user()->signature ? asset('storage/' . Auth::user()->signature) : asset('backend/assets/dist/img/nopreview.jpeg') }})">
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                            <label>{{ localize('signature') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal">{{ localize('close') }}</button>
                        <button class="btn btn-success">{{ localize('update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> {{ localize('change_password') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="changePasswordForm" action="{{ route('profile.changePassword') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label>{{ localize('current_password') }}</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control" required autocomplete="current-password">
                                        <div class="text-danger" id="current_password_error"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>{{ localize('new_password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required autocomplete="new-password">
                                        <div class="text-danger" id="new_password_error"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>{{ localize('confirm_password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ localize('close') }}</button>
                        <button type="reset" class="btn btn-warning">{{ localize('reset') }}</button>
                        <button class="btn btn-success">{{ localize('update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.layouts.assets.js')
    <script src="{{ asset('backend/assets/menuSearch.js') }}"></script>
    <script src="{{ asset('backend/assets/dist/js/localization.js') }}"></script>
    @stack('js')
    <script>
        @if (session()->has('toastr'))
            toastr.error("{{ session('toastr') }}");
        @endif
    </script>
</body>

</html>
