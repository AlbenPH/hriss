@extends('backend.layouts.app')
@section('title', localize('dashboard'))
@push('css')
    <link href="{{ asset('backend/assets/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/apexcharts/dist/apexcharts.css') }}" rel="stylesheet">
@endpush
@section('content')
    @include('backend.layouts.common.message')

    <div class="tab-content" id="pills-tabContent">
        <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row g-4">
                <div class="col-lg-5 col-xl-3 col-xxl-2">
                    <div class="d-flex gap-3 flex-column justify-content-between h-100">
                        <div class="card justify-content-center h-100 p-4 rounded-15">
                            <div class="d-flex gap-2 align-items-center justify-content-between">
                                <div>
                                    <p class="fs-16 fw-medium mb-1">
                                        {{ localize('total_employee') }}
                                    </p>
                                    <h3 class="mb-0 fw-bold">
                                        {{ $total_employee }}
                                    </h3>
                                </div>
                                <div class="bg-soft-success p-2 rounded-3">
                                    <svg width="26" height="20" viewBox="0 0 26 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.4102 9.23327C20.6623 8.28328 21.4682 6.82078 21.4682 5.1749C21.4682 2.32078 19.0463 0 16.0741 0C14.5794 0 13.2275 0.587489 12.2484 1.52916C11.4382 1.0625 10.5067 0.808341 9.55352 0.808341C6.68111 0.808341 4.34136 3.04582 4.34136 5.79177C4.34136 7.35011 5.09958 8.74589 6.27805 9.66268C4.98259 10.1127 3.79112 10.821 2.7859 11.7835C0.992187 13.5085 0 15.8 0 18.2458C0 19.2125 0.818855 20 1.82837 20H24.1283C25.1595 20 26 19.1917 26 18.2C25.9957 14.071 23.2447 10.5458 19.4102 9.23327ZM16.0742 1.66666C18.0931 1.66666 19.7352 3.24163 19.7352 5.1749C19.7352 7.10817 18.0931 8.68314 16.0742 8.68314C14.0552 8.68314 12.4131 7.10817 12.4131 5.1749C12.4131 3.24163 14.0552 1.66666 16.0742 1.66666ZM6.07882 5.79169C6.07882 3.96253 7.63855 2.47492 9.55793 2.47492C10.1515 2.47492 10.7277 2.62075 11.239 2.89158C10.8837 3.57907 10.6801 4.35408 10.6801 5.1749C10.6801 6.35822 11.1003 7.44987 11.8022 8.32474C11.1913 8.82474 10.4115 9.10807 9.59259 9.11223H9.5276C7.62558 9.09973 6.07882 7.60832 6.07882 5.79169ZM1.82857 18.3332C1.77658 18.3332 1.73325 18.2957 1.73325 18.2457C1.73325 16.2499 2.54345 14.3748 4.01654 12.9665C5.4853 11.5582 7.44352 10.7791 9.52317 10.7791H9.59249C9.67915 10.7791 9.7658 10.7874 9.85245 10.7874C7.5995 12.5332 6.15234 15.2082 6.15234 18.1999C6.15234 18.2457 6.161 18.2874 6.16534 18.3332L1.82857 18.3332ZM24.1241 18.3332H8.02426C7.9506 18.3332 7.88561 18.2749 7.88561 18.1999C7.88561 13.8708 11.5466 10.3498 16.0484 10.3498H16.1004C20.6018 10.3498 24.2631 13.8706 24.2631 18.1999C24.2631 18.2749 24.2025 18.3332 24.1245 18.3332H24.1241Z"
                                            fill="#00B074" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-content-center h-100 p-4 rounded-15">
                            <div class="d-flex gap-2 align-items-center justify-content-between">
                                <div>
                                    <p class="fs-16 fw-medium mb-1">
                                        {{ localize('today_presents') }}
                                    </p>
                                    <h3 class="mb-0 fw-bold">
                                        {{ bt_number_format($present_employee) }}
                                    </h3>
                                </div>
                                <div class="p-2 rounded-3" style="background-color: #D0E7FF">
                                    <svg width="26" height="24" viewBox="0 0 26 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.26239 13.1559C5.26233 14.3654 5.45188 15.5629 5.82021 16.6803C6.18854 17.7977 6.72843 18.813 7.40907 19.6682C8.08971 20.5234 8.89775 21.2018 9.78706 21.6646C10.6764 22.1274 11.6295 22.3657 12.5921 22.3657C13.5547 22.3657 14.5079 22.1274 15.3972 21.6646C16.2865 21.2018 17.0946 20.5234 17.7752 19.6682C18.4558 18.813 18.9957 17.7977 19.3641 16.6803C19.7324 15.5629 19.9219 14.3654 19.9219 13.1559C19.9219 11.9465 19.7324 10.749 19.3641 9.63158C18.9957 8.51421 18.4558 7.49893 17.7752 6.64372C17.0946 5.78852 16.2865 5.11012 15.3972 4.64729C14.5079 4.18445 13.5547 3.94623 12.5921 3.94623C11.6295 3.94623 10.6764 4.18445 9.78706 4.64729C8.89775 5.11012 8.08971 5.78852 7.40907 6.64372C6.72843 7.49893 6.18854 8.51421 5.82021 9.63158C5.45188 10.749 5.26233 11.9465 5.26239 13.1559Z"
                                            fill="#007BFF" fill-opacity="0.15" />
                                        <path
                                            d="M0.563827 12.5921C0.187942 12.5921 0 12.2162 0 11.8404C0 10.9007 0.375884 8.83329 1.69148 6.57798C1.87942 6.20209 2.25531 6.20209 2.63119 6.39004C3.00708 6.57798 3.19502 7.14181 2.81913 7.32975C1.69148 9.58505 1.3156 11.2765 1.3156 12.0283C1.3156 12.4042 0.939711 12.5921 0.563827 12.5921ZM3.19502 6.39004C3.00708 6.39004 2.81913 6.39004 2.81913 6.20209C2.44325 6.01415 2.44325 5.45033 2.63119 5.26238C3.94679 3.5709 5.63827 2.25531 7.32975 1.3156C7.70563 1.12765 8.08152 1.3156 8.26946 1.69148C8.4574 2.06736 8.26946 2.44325 7.89357 2.63119C6.39004 3.38296 5.07444 4.51061 3.75885 6.01415C3.75885 6.20209 3.5709 6.39004 3.19502 6.39004ZM9.96094 1.87942C9.58506 1.87942 9.39711 1.69148 9.20917 1.3156C9.20917 0.939711 9.39711 0.563827 9.773 0.375884C10.9007 0 12.2162 0 13.5318 0C14.0957 0.187942 14.2836 0.563827 14.2836 0.939711C14.2836 1.3156 13.9077 1.69148 13.5318 1.69148C12.4042 1.50354 11.2765 1.50354 9.96094 1.87942C10.1489 1.87942 10.1489 1.87942 9.96094 1.87942ZM18.9822 3.19502C18.7942 3.19502 18.7942 3.19502 18.6063 3.00708C17.4786 2.25531 16.163 1.87942 14.8474 1.50354C14.6595 1.69148 14.2836 1.3156 14.4716 0.939711C14.4716 0.563827 14.8474 0.375884 15.2233 0.375884C16.7269 0.751769 18.0425 1.12765 19.3581 2.06736C19.7339 2.25531 19.7339 2.63119 19.546 3.00708C19.546 3.19502 19.1701 3.19502 18.9822 3.19502ZM24.6204 14.4716C24.2446 14.4716 23.8687 14.0957 23.8687 13.7198C23.6807 9.58506 22.3651 6.39004 20.1098 4.32267C19.7339 4.13473 19.7339 3.5709 20.1098 3.38296C20.2978 3.00708 20.8616 3.00708 21.0495 3.38296C23.4928 5.63827 24.9963 9.20917 25.1843 13.7198C25.3722 14.0957 24.9963 14.4716 24.6204 14.4716Z"
                                            fill="#007BFF" />
                                        <path
                                            d="M20.2978 22.5531H20.1098C19.7339 22.3651 19.546 21.9893 19.7339 21.6134C19.7339 21.6134 20.1098 20.4857 20.6736 18.2304C21.2375 15.9751 20.8616 12.968 20.8616 12.968C20.8616 9.77301 18.9822 6.76593 15.9751 5.45034C15.5992 5.26239 15.4113 4.88651 15.5992 4.51062C15.7871 4.13474 16.163 3.9468 16.5389 4.13474C19.9219 5.63828 22.1772 9.02124 22.1772 12.7801C22.1772 12.7801 22.5531 15.9751 21.9892 18.4183C21.4254 20.8616 20.8616 21.9893 20.8616 21.9893C20.6736 22.3651 20.4857 22.5531 20.2978 22.5531ZM7.70563 6.2021C7.51769 6.2021 7.32975 6.01416 7.1418 5.82622C6.95386 5.63828 7.1418 5.26239 7.32975 5.07445C9.39711 3.57091 11.8404 3.00709 14.2836 3.57091C14.6595 3.57091 14.8474 3.9468 14.8474 4.32268C14.8474 4.69857 14.4716 4.88651 14.0957 4.88651C12.0283 4.51062 9.96094 4.88651 8.26946 6.2021H7.70563ZM0.751769 16.9148C0.375884 16.9148 0.187942 16.7269 0 16.351C0 15.9751 0.187942 15.5992 0.563827 15.5992C0.563827 15.5992 1.3156 15.4113 2.06736 14.6595C2.63119 14.0957 3.19502 13.156 3.38296 12.7801C3.38296 10.7127 4.13473 8.64535 5.45032 6.95387C5.63827 6.57799 6.20209 6.39005 6.39004 6.76593C6.76592 6.95387 6.76592 7.32976 6.57798 7.70564C5.45032 9.20918 4.69856 10.9007 4.69856 12.7801V12.968C4.69856 13.156 4.13473 14.8474 3.00708 15.5992C1.87942 16.5389 0.939711 16.9148 0.939711 16.9148H0.751769Z"
                                            fill="#007BFF" />
                                        <path
                                            d="M2.2553 19.3581C2.06736 19.3581 1.87942 19.1701 1.69147 18.9822C1.50353 18.6063 1.50353 18.2304 1.87942 18.0425C1.87942 18.0425 4.32267 16.351 5.07443 15.7872C5.26238 15.5992 5.8262 14.6595 6.01415 13.7198C6.01415 12.2163 6.95386 9.58508 7.89357 8.45743C7.89357 8.45743 8.26945 7.8936 9.20917 7.32977C9.96093 6.95389 10.9006 6.578 11.8404 6.578C12.2162 6.39006 12.5921 6.578 12.5921 6.95389C12.5921 7.32977 12.4042 7.70566 12.0283 7.70566C11.2765 7.70566 10.7127 7.8936 10.1489 8.26948C9.39711 8.83331 9.02122 9.20919 9.02122 9.20919C8.26945 10.1489 7.32974 12.5922 7.32974 13.9078V14.0957C7.1418 14.6595 6.57797 16.351 5.8262 17.1028C5.26238 17.4787 2.81913 19.1701 2.63119 19.3581H2.2553ZM17.1027 10.3368C16.9148 10.3368 16.7269 10.3368 16.5389 10.1489C15.9751 9.20919 15.0354 8.45743 13.9077 8.08154C13.5318 7.8936 13.3439 7.51771 13.5318 7.14183C13.5318 6.76594 14.0957 6.578 14.4715 6.76594C15.7871 7.32977 17.1027 8.26948 17.8545 9.20919C18.0425 9.58508 18.0424 9.96096 17.6666 10.1489C17.4786 10.3368 17.2907 10.3368 17.1027 10.3368ZM17.6666 17.4787C17.1027 17.2907 16.9148 16.9148 16.9148 16.5389C17.1027 15.9751 17.1027 15.5992 17.2907 15.4113C17.4786 14.6595 17.4786 12.968 17.4786 12.968C17.4786 12.5922 17.4786 12.0283 17.2907 11.6524C17.2907 11.2766 17.4786 10.9007 17.8545 10.7127C18.2304 10.5248 18.6063 10.9007 18.7942 11.2766C18.9822 11.8404 18.9822 12.4042 18.9822 12.968C18.9822 12.968 18.7942 14.8475 18.7942 15.5992C18.7942 15.7872 18.6063 16.1631 18.6063 16.7269C18.2304 17.1028 18.0424 17.4787 17.6666 17.4787Z"
                                            fill="#007BFF" />
                                        <path
                                            d="M16.163 22.929H15.9751C15.5992 22.741 15.4113 22.3651 15.5992 21.9893C15.5992 21.9893 16.163 19.9219 16.7269 18.0425C16.7269 17.6666 17.2907 17.4786 17.6666 17.4786C18.0425 17.4786 18.2304 17.8545 18.2304 18.4183C17.8545 20.2978 17.1028 22.3651 17.1028 22.3651C16.7269 22.741 16.5389 22.929 16.163 22.929Z"
                                            fill="#007BFF" />
                                        <path
                                            d="M13.156 23.1169C12.5921 22.929 12.4042 22.5531 12.4042 22.1772L14.4716 13.7198C14.8474 12.5921 14.0957 11.4645 12.968 11.0886C11.8404 10.9006 10.5248 11.6524 10.3368 12.7801L8.4574 18.2304L4.69855 21.2375C4.32267 21.6134 3.75884 21.6134 3.5709 21.2375C3.38296 20.8616 3.38296 20.4857 3.75884 20.2978L7.32974 17.4786L9.02122 12.5921C9.02122 11.6524 9.77299 10.7127 10.5248 10.3368C11.2765 9.773 12.4042 9.58505 13.3439 9.96094C15.2233 10.3368 16.5389 12.2162 15.9751 14.2836L13.9077 22.741C13.9077 22.929 13.5318 23.1169 13.156 23.1169Z"
                                            fill="#007BFF" />
                                        <path
                                            d="M9.02123 23.3049H8.64535C8.26946 23.1169 8.26946 22.741 8.4574 22.3651L10.5248 18.6063L11.6524 13.3439C11.6524 12.968 12.0283 12.7801 12.4042 12.7801C12.7801 12.7801 12.968 13.156 12.968 13.5319L11.8404 19.1701L9.58506 23.1169C9.58506 23.1169 9.20917 23.3049 9.02123 23.3049Z"
                                            fill="#007BFF" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-content-center h-100 p-4 rounded-15">
                            <div class="d-flex gap-2 align-items-center justify-content-between">
                                <div>
                                    <p class="fs-16 fw-medium mb-1">
                                        {{ localize('today_absents') }}
                                    </p>
                                    @php
                                        $prandleave =
                                            (!empty($present_employee) ? $present_employee : 0) +
                                            (!empty($today_leave) ? $today_leave : 0);
                                        $today_absents = $total_employee - $prandleave;
                                    @endphp
                                    <h3 class="mb-0 fw-bold">
                                        {{ number_format($today_absents) }}
                                    </h3>
                                </div>
                                <div class="p-2 rounded-3" style="background-color: #F8D7DA">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22"
                                        viewBox="0 0 640 512">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"
                                            fill="#DC3545" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card justify-content-center h-100 p-4 rounded-15">
                            <div class="d-flex gap-2 align-items-center justify-content-between">
                                <div>
                                    <p class="fs-16 fw-medium mb-1">
                                        {{ localize('today_leave') }}
                                    </p>
                                    <h3 class="mb-0 fw-bold">
                                        {{ number_format($today_leave) }}
                                    </h3>
                                </div>
                                <div class="p-2 rounded-3"  style="background-color: #E2E3E5">
                                    <svg width="26" height="22" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                                            fill="#6C757D" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-5 col-xxl-6">
                    <div class="card h-100 rounded-15">
                        <div class="card-header d-flex pb-2 align-items-center justify-content-between">
                            <h5 class="m-0 fs-18 fw-semi-bold">
                                {{ localize('Daily Attendance statistic (Department wise)') }}
                            </h5>
                        </div>
                        <div class="card-body pt-2">
                            <div id="attendance"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card h-100 rounded-15">
                        <div class="card-header align-items-center">
                            <h5 class="m-0 fs-18 fw-semi-bold text-color-1">
                                Leave Application
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @foreach ($leaveEmployees as $leave)
                                <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <img class="rounded-3 dashboard-user-img" src="./assets/user-1.png"
                                            alt="" />
                                        <div>
                                            <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                                {{ $leave->employee?->full_name }}
                                            </p>
                                            <p class="mb-2 lh-1 fs-14 fw-normal">
                                                {{ $leave->employee?->position?->position_name }}
                                            </p>
                                            <p class="mb-0 lh-1 fs-14 fw-medium">
                                                {{ localize('reason') }} : {{ Str::limit($leave->reason, 20) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-soft-{{ $leave->is_approved ? 'success' : 'warning' }} w-px-90 rounded-3 p-1">
                                        <p
                                            class="mb-0 fs-14 fw-semi-bold text-color-{{ $leave->is_approved ? '3' : '2' }} text-center">
                                            {{ $leave->is_approved ? 'Approved' : 'Pending' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="py-3">
                                <a href="{{ route('leave.index') }}"
                                    class="d-flex gap-1 align-items-center justify-content-center lh-lg fs-14 fw-semi-bold text-color-3">
                                    See All Request
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 4H10M10 4L6.75 1M10 4L6.75 7" stroke="#00B074" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
             

                <div class="col-lg-6 col-xl-4">
                    <div class="card h-100 rounded-15">
                        <div class="card-header d-flex gap-3 align-items-center">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.5 0C4.99706 0 5.4 0.402944 5.4 0.9V1.8H12.6V0.9C12.6 0.402944 13.0029 0 13.5 0C13.9971 0 14.4 0.402944 14.4 0.9V1.80002C14.8131 1.80028 15.1733 1.80282 15.4755 1.82751C15.8313 1.85658 16.1853 1.92076 16.5258 2.09429C17.0337 2.3531 17.4468 2.76611 17.7057 3.2742L17.7057 3.27431C17.8792 3.61482 17.9434 3.96869 17.9725 4.32447C18 4.66158 18 5.07086 18 5.54529V14.2547C18 14.7291 18 15.1384 17.9725 15.4755C17.9434 15.8313 17.8792 16.1852 17.7057 16.5257C17.4469 17.0338 17.0338 17.4469 16.5257 17.7057C16.1852 17.8792 15.8313 17.9434 15.4755 17.9725C15.1384 18 14.7291 18 14.2547 18H3.74529C3.27087 18 2.86158 18 2.52447 17.9725C2.16869 17.9434 1.81483 17.8792 1.47431 17.7057C0.966166 17.4469 0.553123 17.0338 0.294291 16.5258C0.120766 16.1853 0.0565843 15.8313 0.0275143 15.4755C-2.93026e-05 15.1384 -1.52951e-05 14.7291 7.72383e-07 14.2547V5.54531C-1.52951e-05 5.07087 -2.93026e-05 4.66159 0.0275145 4.32447C0.0565852 3.96867 0.0919921 3.61653 0.265502 3.276M3.78 3.6C3.2611 3.6 2.92606 3.6007 2.67106 3.62153C2.42656 3.64151 2.33591 3.67542 2.29142 3.69809C2.12208 3.78437 1.98438 3.92205 1.89811 4.09139C1.87543 4.13589 1.84151 4.22656 1.82154 4.47105C1.8007 4.72605 1.8 5.0611 1.8 5.58V14.22C1.8 14.7389 1.8007 15.0739 1.82154 15.329C1.84151 15.5735 1.87543 15.6641 1.89809 15.7086C1.98439 15.878 2.12208 16.0156 2.29133 16.1018L2.29143 16.1019C2.33592 16.1246 2.42656 16.1585 2.67106 16.1785C2.92606 16.1993 3.2611 16.2 3.78 16.2H14.22C14.7389 16.2 15.0739 16.1993 15.329 16.1785C15.5735 16.1585 15.6641 16.1246 15.7086 16.1019L15.7087 16.1019C15.8779 16.0156 16.0156 15.8779 16.1019 15.7087L16.1019 15.7086C16.1246 15.6641 16.1585 15.5735 16.1785 15.329C16.1993 15.0739 16.2 14.7389 16.2 14.22V5.58C16.2 5.0611 16.1993 4.72605 16.1785 4.47105C16.1585 4.22656 16.1246 4.13592 16.1019 4.09143L16.1019 4.09132C16.0156 3.92208 15.878 3.78439 15.7086 3.69809C15.6641 3.67543 15.5735 3.64151 15.329 3.62153C15.0739 3.6007 14.7389 3.6 14.22 3.6H3.78ZM3.6 7.2C3.6 6.70294 4.00294 6.3 4.5 6.3H13.5C13.9971 6.3 14.4 6.70294 14.4 7.2C14.4 7.69706 13.9971 8.1 13.5 8.1H4.5C4.00294 8.1 3.6 7.69706 3.6 7.2ZM3.6 10.8C3.6 10.3029 4.00294 9.9 4.5 9.9H9C9.49706 9.9 9.9 10.3029 9.9 10.8C9.9 11.2971 9.49706 11.7 9 11.7H4.5C4.00294 11.7 3.6 11.2971 3.6 10.8Z"
                                    fill="#00B074" />
                            </svg>
                            <h5 class="m-0 fs-18 fw-semi-bold">
                                {{ localize('notice') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach ($notices as $notice)
                                <div class="bg-soft-aliceblue rounded-10 p-3 mb-3">
                                    <div class="d-flex gap-3 justify-content-between mb-2">
                                        <p class="text-black mb-0 fw-semi-bold fs-16">
                                            {{ $notice->notice_descriptiion }}
                                        </p>
                                        <svg width="20" height="20" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.5042 1.6483C6.66128 1.27875 6.73986 1.09398 6.84924 1.03708C6.94423 0.987641 7.05578 0.987641 7.15078 1.03708C7.26016 1.09398 7.33873 1.27875 7.49581 1.6483L8.74703 4.59178C8.79351 4.70103 8.81672 4.75565 8.85268 4.79748C8.88444 4.83449 8.92332 4.8641 8.96668 4.88436C9.01573 4.90727 9.07246 4.91355 9.18591 4.9261L12.2422 5.26436C12.626 5.30682 12.8178 5.32805 12.9032 5.41955C12.9774 5.49902 13.0118 5.6103 12.9964 5.72033C12.9786 5.84698 12.8353 5.98238 12.5487 6.25325L10.2656 8.4107C10.1809 8.49075 10.1385 8.53081 10.1117 8.57955C10.088 8.62273 10.0731 8.67062 10.0681 8.72014C10.0625 8.77614 10.0743 8.83462 10.098 8.95167L10.7357 12.1042C10.8158 12.5 10.8558 12.6979 10.7992 12.8113C10.75 12.9099 10.6598 12.9786 10.5552 12.9972C10.4348 13.0185 10.2677 12.9175 9.93345 12.7154L7.27122 11.1052C7.17242 11.0454 7.12303 11.0156 7.07051 11.0039C7.02403 10.9936 6.97599 10.9936 6.92951 11.0039C6.87699 11.0156 6.82759 11.0454 6.7288 11.1052L4.06657 12.7154C3.73234 12.9175 3.56522 13.0185 3.44484 12.9972C3.34027 12.9786 3.25 12.9099 3.20085 12.8113C3.14427 12.6979 3.18429 12.5 3.26435 12.1042L3.90201 8.95167C3.92568 8.83462 3.93751 8.77614 3.9319 8.72014C3.92692 8.67062 3.91208 8.62273 3.88833 8.57955C3.8615 8.53081 3.81913 8.49075 3.7344 8.4107L1.45139 6.25325C1.16476 5.98238 1.02145 5.84698 1.00363 5.72033C0.988162 5.6103 1.02264 5.49902 1.09683 5.41955C1.18224 5.32805 1.3741 5.30682 1.75781 5.26436L4.81414 4.9261C4.92757 4.91355 4.98429 4.90727 5.03333 4.88436C5.07672 4.8641 5.11558 4.83449 5.14737 4.79748C5.1833 4.75565 5.20652 4.70103 5.25297 4.59178L6.5042 1.6483Z"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="d-flex gap-3 justify-content-between">
                                        <div class="bg-white p-2 rounded-3">
                                            <p class="text-black-50 fw-medium mb-0 fs-16">
                                                {{ $notice->notice_type }}
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.5 0C4.99706 0 5.4 0.402944 5.4 0.9V1.8H12.6V0.9C12.6 0.402944 13.0029 0 13.5 0C13.9971 0 14.4 0.402944 14.4 0.9V1.80002C14.8131 1.80028 15.1733 1.80282 15.4755 1.82751C15.8313 1.85658 16.1853 1.92076 16.5258 2.09429C17.0337 2.3531 17.4468 2.76611 17.7057 3.2742L17.7057 3.27431C17.8792 3.61482 17.9434 3.96869 17.9725 4.32447C18 4.66158 18 5.07086 18 5.54529V14.2547C18 14.7291 18 15.1384 17.9725 15.4755C17.9434 15.8313 17.8792 16.1852 17.7057 16.5257C17.4469 17.0338 17.0338 17.4469 16.5257 17.7057C16.1852 17.8792 15.8313 17.9434 15.4755 17.9725C15.1384 18 14.7291 18 14.2547 18H3.74529C3.27087 18 2.86158 18 2.52447 17.9725C2.16869 17.9434 1.81483 17.8792 1.47431 17.7057C0.966166 17.4469 0.553123 17.0338 0.294291 16.5258C0.120766 16.1853 0.0565843 15.8313 0.0275143 15.4755C-2.93026e-05 15.1384 -1.52951e-05 14.7291 7.72383e-07 14.2547V5.54531C-1.52951e-05 5.07087 -2.93026e-05 4.66159 0.0275145 4.32447C0.0565852 3.96867 0.0919921 3.61653 0.265502 3.276M3.78 3.6C3.2611 3.6 2.92606 3.6007 2.67106 3.62153C2.42656 3.64151 2.33591 3.67542 2.29142 3.69809C2.12208 3.78437 1.98438 3.92205 1.89811 4.09139C1.87543 4.13589 1.84151 4.22656 1.82154 4.47105C1.8007 4.72605 1.8 5.0611 1.8 5.58V14.22C1.8 14.7389 1.8007 15.0739 1.82154 15.329C1.84151 15.5735 1.87543 15.6641 1.89809 15.7086C1.98439 15.878 2.12208 16.0156 2.29133 16.1018L2.29143 16.1019C2.33592 16.1246 2.42656 16.1585 2.67106 16.1785C2.92606 16.1993 3.2611 16.2 3.78 16.2H14.22C14.7389 16.2 15.0739 16.1993 15.329 16.1785C15.5735 16.1585 15.6641 16.1246 15.7086 16.1019L15.7087 16.1019C15.8779 16.0156 16.0156 15.8779 16.1019 15.7087L16.1019 15.7086C16.1246 15.6641 16.1585 15.5735 16.1785 15.329C16.1993 15.0739 16.2 14.7389 16.2 14.22V5.58C16.2 5.0611 16.1993 4.72605 16.1785 4.47105C16.1585 4.22656 16.1246 4.13592 16.1019 4.09143L16.1019 4.09132C16.0156 3.92208 15.878 3.78439 15.7086 3.69809C15.6641 3.67543 15.5735 3.64151 15.329 3.62153C15.0739 3.6007 14.7389 3.6 14.22 3.6H3.78ZM3.6 7.2C3.6 6.70294 4.00294 6.3 4.5 6.3H13.5C13.9971 6.3 14.4 6.70294 14.4 7.2C14.4 7.69706 13.9971 8.1 13.5 8.1H4.5C4.00294 8.1 3.6 7.69706 3.6 7.2ZM3.6 10.8C3.6 10.3029 4.00294 9.9 4.5 9.9H9C9.49706 9.9 9.9 10.3029 9.9 10.8C9.9 11.2971 9.49706 11.7 9 11.7H4.5C4.00294 11.7 3.6 11.2971 3.6 10.8Z"
                                                    fill="#00B074" />
                                            </svg>
                                            <p class="text-black-50 fw-medium mb-0 fs-16">
                                                {{ \Carbon\Carbon::parse($notice->notice_date)->format('d-M-y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('notice.index') }}"
                                class="d-flex gap-1 align-items-center justify-content-center fs-14 fw-semi-bold">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="departmentWiseAttendanceReport"
        value="{{ json_encode($departmentWiseAttendanceReport) }}" />
    <input type="hidden" id="positionWiseAttendanceReport" value="{{ json_encode($positionWiseAttendanceReport) }}" />
    <input type="hidden" id="positionWiseRecruitmentUrl" value="{{ route('positionWiseRecruitment', '') }}" />
    <input type="hidden" id="departmentWiseAttendanceUrl" value="{{ route('departmentWiseAttendance', '') }}" />
@endsection

@push('js')
    <script src="{{ asset('backend/assets/plugins/apexcharts/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('backend/assets/dist/js/dashboardChart.js?v=1') }}"></script>
@endpush
