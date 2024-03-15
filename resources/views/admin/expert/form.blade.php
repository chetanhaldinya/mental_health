<!--begin::Card body-->
<div class="card-body">
    <!--begin::Input group-->
    <div class="row mb-6">
       
        <!--begin::Col-->
        <div class="col-lg-6 fv-row">
             <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.name', 1) }}</label>
        <!--end::Label-->
            {!! Form::text('name', null, ['placeholder' => __('placeholder.name'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->

         <!--begin::Col-->
         <div class="col-lg-6 fv-row">
             <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('surname', 1) }}</label>
        <!--end::Label-->
            {!! Form::text('surname', null, ['placeholder' => __('placeholder.surname'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <div class="row mb-6">
      <!--begin::Label-->
      <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('gender', 1) }}</label>
       <!--end::Label-->    
    <!--begin::Col-->
    <div class="col-lg-10 fv-row">
       
        {!! Form::radio('gender', 'male', false, ['class' => 'form-check-input', 'id' => 'male']) !!}
        <label class="form-check-label" for="male">Male</label>

        {!! Form::radio('gender', 'female', false, ['class' => 'form-check-input', 'id' => 'female']) !!}
        <label class="form-check-label" for="female">Female</label>

        {!! Form::radio('gender', 'other', false, ['class' => 'form-check-input', 'id' => 'other']) !!}
        <label class="form-check-label" for="other">Other</label>
        
       
    </div>
    <!--end::Col-->
</div>

    

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.about', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::textarea('about', null, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0 ckeditor', 'id' => 'ckeditor', 'rows' => 3, 'cols' => 40, 'placeholder' => __('placeholder.about')]) !!}
            @if ($errors->has('about'))
                <span style="color:red">{{ $errors->first('about') }}</span>
            @endif
        </div>

        {{-- <span style="color:#f1416c" id='content_error'></span> --}}
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
       
        <!--begin::Col-->
        <div class="col-lg-6 fv-row">
             <!--begin::Label-->
        <label
            class="col-lg-3 col-form-label required fw-bold fs-6">{{ trans_choice('content.designation', 1) }}</label>
        <!--end::Label-->
            {!! Form::text('designation', null, ['placeholder' => __('placeholder.designation'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->

         <!--begin::Col-->
         <div class="col-lg-6 fv-row">

<!--begin::Label-->
<label
   class="col-lg-3 col-form-label required fw-bold fs-6">{{ trans_choice('content.qualification', 1) }}</label>
<!--end::Label-->
   {!! Form::text('qualification', null, ['placeholder' => __('placeholder.qualification'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
</div>

<!--end::Col-->
    </div>
    <!--end::Input group-->

  
    <!--end::Input group-->

    <div class="row mb-6">
       
        <div class="col-lg-6 fv-row">

        <label class="col-lg-6 col-form-label required fw-bold fs-6">{{ trans_choice('content.image', 1) }}(1765px * 776px)</label>
        {!! Form::file('image', [
            'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
     <!--begin::Col-->
     <div class="col-lg-6 fv-row">
            <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.fees', 1) }}</label>
        <!--end::Label-->
            {!! Form::number('fees', null, ['placeholder' => __('placeholder.fees'), 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->
    <div class="col-lg-3 fv-row">
            @if (isset($expert->image))
                <img id="backImage_image" width="80px" height="80px" src="{{ $expert->image }}" title="Image">
                @else
                <img id="backImage_image" src="{{blankImageUrl()}}" width="80px" height="80px" title="Image">
            @endif
        </div>
    </div>
    

     <!--begin::Input group-->
     <div class="row mb-6">
        
       
    </div>
    <!--end::Input group-->
    
</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ExpertRequest', 'form') !!}
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
