@extends('admin.layouts.base')

@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.expert', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.experts.index'),
        'filter' => false,
        'create_btn' => [
            'status' => true,
            'route' => route('admin.experts.create'),
            'name' => __('messages.create', [
                'name' => trans_choice('content.expert', 2),
            ]),
        ],
        // 'export' => [
        //     'status' => true,
        //     'route' => route('admin.experts.getdownload'),
        // ],
    ])
    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.name', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('surname', 1)],
           
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.qualification', 1)],
           
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.fees', 1)],
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
                    [6, 'desc']
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
                    "url": "{{ route('admin.experts.index') }}",
                    data: function(d) {
                        d.name = $('input[name=name]').val();
                        d.status = $('select[name=status]').val();
                    },
                },
                dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [7],
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
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}" class="text-dark">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                            // return actionTitleButton(data, show_url);
                        }
                    },

                    {
                        data: 'surname',
                        name: 'surname',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}" class="text-dark">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                        }
                    },

                    

                    {
                        data: 'qualification',
                        name: 'qualification',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}" class="text-dark">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                            // return actionTitleButton(data, show_url);
                        }
                    },

                   
                    {
                        data: 'fees',
                        name: 'fees',
                        render: function(data, type, row, meta) {
                            var show_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `?tab=details`;
                            return ` <a href="${show_url}" class="text-dark">
                                    <div class="font-medium whitespace-no-wrap">${data}</div>
                                </a>`;
                        }
                    },

                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function(data, type, row, meta) {
                            var attr = `data-id="${ row['id'] }" data-status="${ data }"`;
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
                        // visible:false,
                        render: function(data, type, row, meta) {

                            var edit_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `/edit/?tab=edit`;
                            var show_url = `{{ url('/') }}/admin/experts/` + row['id'] +
                                `?tab=details`;
                            var edit_data = actionEditButton(edit_url, row['id']);
                            var show_data = actionShowButton(show_url);
                            var del_data = actionDeleteButton(row['id']);
                            return `<div class="flex justify-left items-center">${show_data} ${edit_data} ${del_data} </div>`;

                        }
                    },
                ],
            });
        });

        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/experts/` + id;
            tableDeleteRow(url, oTable);
        });
        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/experts/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
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
    </script>
@endpush
