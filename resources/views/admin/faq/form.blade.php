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
            'id' => 'is_active',
            'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0',
        ]) !!}
           </div>

        <!--end::Col-->
    </div>
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.question_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::text('question', null, ['placeholder' => __('placeholder.question'),'id' => 'question', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->

     <!--begin::Input group-->
     <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.answer_title', 1) }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-10 fv-row">
            {!! Form::text('answer', null, ['placeholder' => __('placeholder.answer'), 'id' => 'answer', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'required' => 'required']) !!}
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->

</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\FaqRequest', 'form') !!}
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
    <script>
   $(document).ready(function(){
      $("#submitBtn").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData ={
            question: $('#question').val(),
            answer: $('#answer').val(),
            is_active: $('#is_active').val(),
        };
        var type = "POST";
        var ajaxurl = "{{route('admin.faqs.store')}}";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                window.location.href = "{{ route('admin.faqs.index') }}";
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
   });
</script>
@endpush
