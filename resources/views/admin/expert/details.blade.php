@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.expert', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.experts.show'),
    ])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Content-->
                <div id="kt_account_profile_details">

                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <!--begin::Input group-->
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.name', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->name }}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                           <!--begin::Input group-->
                           <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.surname', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->surname }}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                           <!--begin::Input group-->
                           <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.gender', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->gender }}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                           <!--begin::Input group-->
                           <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.about', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->about }}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                           <!--begin::Input group-->
                           <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.designation', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->designation}}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                          <!--begin::Input group-->
                          <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.qualification', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->qualification}}</div>
                                </div>
                            </div>
                           
                        <!--end::Input group-->

                        <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.image_title', 1) }}</div>
                                    <div class="fs-5 text-gray-600"><a href="{{isset($expert->image) ? $expert->image : 'Na'}}" target="_blank"><div class="font-medium whitespace-no-wrap">
                                        <img src="{{isset($expert->image) ? $expert->image : 'Na'}}" height="150px" width="350px" alt="blog image">
                                  </div></a></div>
                                </div>
                                </div>

                                 <!--begin::Input group-->
                          <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.fees', 1) }}
                                    </div>
                                    <div class="fs-5 text-gray-600">{{ $expert->fees}}</div>
                                </div>
                            </div>
                           
                            <!--end::Input group-->
                          
                         </div>

                            

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('admin.experts.index') }}"
                                class="text-white">{{ __('content.back_title') }}</a>
                        </button>
                    </div>
                    <!--end::Actions-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
