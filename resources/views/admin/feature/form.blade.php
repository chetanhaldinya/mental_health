<!--begin::Card body-->
<div class="card-body">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.status_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
        <div class="col-lg-10 fv-row">
                <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"  name="is_active">
                    <option value="">{{ trans_choice('content.please_select', 1) }}</option>
                    <option value="1">{{ trans_choice('content.active_title', 1) }}</option>
                    <option value="0">{{ trans_choice('content.inactive_title', 1) }}</option>
                </select>
            </div>        </div>

        {{-- <span style="color:#f1416c" id='content_error'></span> --}}
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::text('title', null, ['placeholder' => __('content.title'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\FeatureRequest', 'form') !!}
    {{-- <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content');
        $("form").submit(function(e) {
            e.preventDefault();
            var messageLength = CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
            console.log(messageLength);
            if (!messageLength) {
                $('#content_error').text('The content field is required.');
                e.preventDefault();
            }
        });
    </script> --}}
@endpush
