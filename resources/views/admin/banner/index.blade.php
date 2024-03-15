@extends('admin.layouts.base')

@section('admin_filter_form')
    {!! Form::open(['route' => 'admin.banners.download', 'method' => 'POST', 'id' => 'filter_data', 'class' => 'form mb-15']) !!}
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label
                class="col-lg-4 col-form-label required fw-bold fs-6">{{ trans_choice('content.heading', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('heading', null, ['placeholder' => __('content.heading'), 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0 search_input']) !!}
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span class="required">{{ trans_choice('content.banner_id', 1) }}</span>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                {!! Form::text('id', null, ['placeholder' => __('Banner Id'), 'class' => 'form-control form-control-lg form-control-solid only_number search_input']) !!}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.status_title', 1) }}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="col-lg-8 fv-row">
                <select class="form-control form-control-lg form-control-solid search_input" data-control="select2"
                    name="is_active">
                    <option value="">{{ trans_choice('content.please_select', 1) }}</option>
                    <option value="1">{{ trans_choice('content.active_title', 1) }}</option>
                    <option value="0">{{ trans_choice('content.inactive_title', 1) }}</option>
                </select>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--end::Input group-->
    </div>
    <!--end::Card body-->

    <!--begin::Actions-->
    <div class="d-flex justify-content-end">
        @include('admin.layouts.components.buttons.white_btn', [
            'type' => 'reset',
            'id' => 'searchReset',
            'attr' => 'data-kt-menu-dismiss="true"',
            'title' => trans_choice('content.reset', 1),
            'class' => 'btn-active-light-primary',
        ])
        @include('admin.layouts.components.buttons.primary_btn', [
            'id' => 'extraSearch',
            'attr' => 'data-kt-menu-dismiss="true"',
            'title' => __('content.search_title'),
        ])
        @include('admin.layouts.components.buttons.exportbtn')
    </div>
    <!--end::Actions-->
    {!! Form::close() !!}
@endsection

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.banner', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.banners.index'),
        'filter' => true,
        'create_btn' => [
            'status' => true,
            'route' => route('admin.banners.create'),
            'name' => __('messages.create', [
                'name' => trans_choice('content.banner', 2),
            ]),
        ],
        // 'export' => [
        //     'status' => true,
        //     'route' => route('admin.banners.getdownload'),
        // ],
    ])
    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.heading', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.paragraph', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.image', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.status_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.joined_date_title', 1)],
            ['classname' => 'min-w-100px', 'title' => trans_choice('content.action_title', 1)],
        ],
    ])
@endsection

@push('scripts')
    <script>
        var oTable;
        $(document).ready(function() {
            oTable = $('#kt_table_1').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                },
                oLanguage: {
                    sLengthMenu: "Show _MENU_",
                    sEmptyTable: "No Records Found.",
                    infoEmpty: "No entries to show.",
                },
                createdRow: function(row, data, dataIndex) {
                    // Set the data-status attribute, and add a class
                    $(row).attr('role', 'row');
                    $(row).find("td").last().addClass('text-danger');
                },
                ajax: {
                    "url": "{{ route('admin.banners.index') }}",
                    data: function(d) {
                        d.heading = $('input[name=heading]').val();
                        d.id = $('input[name=id]').val();
                        d.is_active = $('select[name=is_active]').val();
                    },
                },
                dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false,
                    // className: 'mdl-data-table__cell--non-numeric'
                }],
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return data;
                            // return "#" + serialNumberShow(meta);
                        }
                    },

                    {
                        data: 'heading',
                        name: 'heading',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/banners/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                        }
                    },
                    {
                        data: 'paragraph',
                        name: 'paragraph',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/banners/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                        }
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row, meta) {
                            return ` <a href="${data}">
                                    <div class="font-medium whitespace-no-wrap">
                                    <img src="${data}" height="150px" width="100px" alt="blog image">
                                    </div>
                                </a>`;
                        }
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function(data, type, row, meta) {
                            var attr = `data-id="${ row['id'] }" data-status="${data}"`;
                            var avtive_data = actionActiveButton(data, attr);
                            return avtive_data;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row, meta) {
                            return getDateTimeByFormat(data);
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {

                            var edit_url = `{{ url('/') }}/admin/banners/` + row['id'] +
                                `/edit/?tab=edit`;
                            var show_url = `{{ url('/') }}/admin/banners/` + row['id'] +
                                `?tab=details`;
                            // var button = actionButton(edit_url, row['id']);
                            var edit_data = actionEditButton(edit_url, row['id']);
                            var show_data = actionShowButton(show_url);
                            // var show_home = actionHomeButton(row['id']);

                            var del_data = actionDeleteButton(row['id']);
                            return `<div class="flex justify-left items-center">  ${show_data} ${edit_data} ${del_data} </div>`;
                            // return `<div class="flex justify-left items-center"> ${button} </div>`;

                        }
                    },
                ],
            });
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/banners/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });
        
        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/banners/` + id;
            tableDeleteRow(url, oTable);
        });
    </script>


    <script>
        $('#extraSearch').on('click', function() {
            //extraSearch is id of search button....
            oTable.draw();
        });

        $(document).on('click', '#searchReset', function(e) {
            //alert('success');
            $('#filter_data').trigger("reset");
            e.preventDefault();
            oTable.draw();
        });

        $(document).on('click', '.drawerReset', function(e) {
            $('#filter_data').trigger("reset");
            e.preventDefault();
            oTable.draw();
        });

        $(document).ready(function() {
            $('#filter_data').trigger("reset");
            oTable.draw();
        });

        $(document).on('click', '#search_filter_excel_download', function(e) {
            var export_type = $(this).attr('data-type');
            console.log(export_type);
            $('#export_type').val(export_type);
            $('#filter_data').submit();
        });
    </script>
@endpush
