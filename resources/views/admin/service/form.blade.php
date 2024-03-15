<!--begin::Card body-->
<div class="card-body">
     <!--begin::Input group-->
 <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.is_active', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::select('is_active', statusArray(), null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0',
        ]) !!}
           </div>

        <!--end::Col-->
    </div>

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.title_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::text('title', null, ['placeholder' => __('placeholder.title'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.image', 1) }}(1765px * 776px)</label>
        <div class="col-lg-7 fv-row">
        {!! Form::file('image', [
            'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
    <div class="col-lg-3 fv-row">
            @if (isset($service->image))
                <img id="backImage_image" width="80px" height="80px" src="{{ $service->image }}" title="Image">
                @else
                <img id="backImage_image" src="{{blankImageUrl()}}" width="80px" height="80px" title="Image">
            @endif
        </div>
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ServiceRequest', 'form') !!}
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
