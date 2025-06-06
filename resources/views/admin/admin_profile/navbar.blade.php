             @php
                 $auth_user = Auth::user();
             @endphp
             <div class="card mb-5 mb-xl-10">
                 <div class="card-body pt-9 pb-0">
                     <!--begin::Details-->
                     <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                         <!--begin: Pic-->
                         <div class="me-7 mb-4">
                             <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                 <img src="{{ asset('admin/dist/media/avatars/blank.png') }}" alt="image" />
                                 <div
                                     class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                 </div>
                             </div>
                         </div>
                         <!--end::Pic-->
                         <!--begin::Info-->
                         <div class="flex-grow-1">
                             <!--begin::Title-->
                             <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                 <!--begin::User-->
                                 <div class="d-flex flex-column">
                                     <!--begin::Name-->
                                     <div class="d-flex align-items-center mb-2">
                                         <a href="#"
                                             class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $auth_user->name }}</a>
                                         <a href="#">
                                             <!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->
                                             <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
                                                     <path
                                                         d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                         fill="#00A3FF" />
                                                     <path class="permanent"
                                                         d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                         fill="white" />
                                                 </svg>
                                             </span>
                                             <!--end::Svg Icon-->
                                         </a>
                                         <!-- <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to
                                                                    Pro</a> -->
                                     </div>
                                     <!--end::Name-->
                                     <!--begin::Info-->
                                     <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                         <a href="#"
                                             class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                             <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                             <span class="svg-icon svg-icon-4 me-1">
                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                         <polygon points="0 0 24 0 24 24 0 24" />
                                                         <path
                                                             d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                             fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                         <path
                                                             d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                             fill="#000000" fill-rule="nonzero" />
                                                     </g>
                                                 </svg>
                                             </span>
                                             <!--end::Svg Icon-->
                                             @if (!empty($auth_user->getRoleNames()))
                                                 @foreach ($auth_user->getRoleNames() as $v)
                                                     {{ $v }}
                                                 @endforeach
                                             @endif
                                         </a>
                                         <a href="#"
                                             class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                             <!--begin::Svg Icon | path: icons/duotone/Communication/Mail-at.svg-->
                                             <span class="svg-icon svg-icon-4 me-1">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
                                                     <path
                                                         d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z"
                                                         fill="#000000" />
                                                 </svg>
                                             </span>
                                             <!--end::Svg Icon-->{{ $auth_user->email }}
                                         </a>
                                     </div>
                                     <!--end::Info-->
                                 </div>
                                 <!--end::User-->
                             </div>
                             <!--end::Title-->
                             <!--begin::Stats-->
                             <div class="d-flex flex-wrap flex-stack">
                                 <!--begin::Wrapper-->
                                 <div class="d-flex flex-column flex-grow-1 pe-8">
                                     <!--begin::Stats-->
                                     <div class="d-flex flex-wrap">
                                         <!--begin::Stat-->
                                         <div
                                             class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                             <!--begin::Number-->
                                             <div class="d-flex align-items-center">
                                                 <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                 <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                         <g stroke="none" stroke-width="1" fill="none"
                                                             fill-rule="evenodd">
                                                             <polygon points="0 0 24 0 24 24 0 24" />
                                                             <rect fill="#000000" opacity="0.5" x="11" y="5" width="2"
                                                                 height="14" rx="1" />
                                                             <path
                                                                 d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                                 fill="#000000" fill-rule="nonzero" />
                                                         </g>
                                                     </svg>
                                                 </span>
                                                 <!--end::Svg Icon-->
                                                 <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                     data-kt-countup-value="4500" data-kt-countup-prefix="₭ ">0</div>
                                             </div>
                                             <!--end::Number-->
                                             <!--begin::Label-->
                                             <div class="fw-bold fs-6 text-gray-400">
                                                 {{ trans_choice('content.total_revenue', 1) }}</div>
                                             <!--end::Label-->
                                         </div>
                                         <!--end::Stat-->
                                         {{-- <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">Projects</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">Success Rate</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat--> --}}
                                     </div>
                                     <!--end::Stats-->
                                 </div>
                                 <!--end::Wrapper-->
                                 <!--begin::Progress-->
                                 <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                     <!-- <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                         <span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
                                         <span class="fw-bolder fs-6">50%</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                         <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->
                                 </div>
                                 <!--end::Progress-->
                             </div>
                             <!--end::Stats-->
                         </div>
                         <!--end::Info-->
                     </div>
                     <!--end::Details-->
                     <!--begin::Navs-->
                     <div class="d-flex overflow-auto h-55px">
                         <ul
                             class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                             <!--begin::Nav item-->
                             <li class="nav-item">
                                 <a class="nav-link {{ request()->is('*profile*') ? 'active text-active-primary me-6' : '' }}"
                                     href="{{ route('admin.profile') }}">{{ trans_choice('messages.my_profile', 1) }}</a>
                             </li>
                             <!--end::Nav item-->
                             <!--begin::Nav item-->
                             <li class="nav-item">
                                 <a class="nav-link {{ request()->is('*change-password*') ? 'active text-active-primary me-6' : '' }}"
                                     href="{{ route('admin.change_password') }}">{{ trans_choice('content.change_password', 1) }}</a>
                             </li>
                             <!--end::Nav item-->
                         </ul>
                     </div>
                     <!--begin::Navs-->
                 </div>
             </div>
