@extends('inventory.layout') 
@section('title', 'Products')
@section('content')
@push('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endpush

	<div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-server bg-blue"></i>
                        <div class="d-inline">
                            <h5>Task</h5>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Products</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- list layout 1 start -->
            <div class="col-md-12">
				<div class="card">
		            <div class="card-header row">
		                
		                <div class="col col-md-12">
		                    <div class="card-options text-right">

			                    <a href="{{route('task.create')}}" class=" btn btn-outline-primary btn-semi-rounded ">Add Task</a>
		                    </div>
		                </div>
		            </div>
		            <div class="card-body">
		                <table   class="datatables table table-borderless hover-table" id="table" class="table">
		                    <thead>
		                        <tr>
		                            <th class="nosort">#SR.NO</th>
		                            <th>Title</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Created_at</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>

                            </tbody>
		                </table>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	
   

	@push('script')                
        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/gauge.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/animate.min.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/pie.js') }}"></script>
        <script src="{{ asset('plugins/ammap3/ammap/ammap.js') }}"></script>
        <script src="{{ asset('plugins/ammap3/ammap/maps/js/usaLow.js') }}"></script>
        <script src="{{ asset('js/product.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    "language": {
                        search: ' ',
                        searchPlaceholder: "Search...",
                        paginate: {
                            next: 'Next <i class="fas fa-chevron-right ms-2"></i>',
                            previous: '<i class="fas fa-chevron-left me-2"></i> Previous'
                        }
                    },
                    "bFilter": true,
                    "bInfo": false,
                    "bLengthChange": false,
                    "bAutoWidth": false,
                    "ajax": {
                        "url": "{{ url()->current() }}",
                        "type": "GET",
                        "data": function(data) {
                            data._token = "{!! csrf_token() !!}";
                        },
                    },
                    "columns": [{
                            "data": 'id',
                            "name": 'id',
                            'orderable': false,
                            'searchable': false,
                            'width': '5%'
                        },
                        {
                            "data": "title",
                            "name": "title"
                        },
                        {
                            "data": "details",
                            "name": "details",
                            "render": function(data, type, row) {
                    var strippedText = data.replace(/(<([^>]+)>)/gi, "");
                    return strippedText;
                }
                        },
                        {
                            "data": "status",
                            "name": "status",
                            "render": function(data, type, row) {
                    var badgeClass = '';
                    var statusText = '';

                    if (data === 'PENDING') {
                        badgeClass = 'badge badge-danger';
                        statusText = 'Pending';
                    } else if (data === 'COMPLETED') {
                        badgeClass = 'badge badge-success';
                        statusText = 'Completed';
                    } else if (data === 'IN_PROGRESS') {
                        badgeClass = 'badge badge-warning';
                        statusText = 'In Progress';
                    }

                    

                    return '<span class="' + badgeClass + '">' + statusText + '</span>';
                }
                        },


                        {
                            "data": "type",
                            "name": "type",
                            "render": function(data, type, row) {
                    var badgeClass = '';
                    var statusText = '';

                    if (data === 'TO-DO') {
                        badgeClass = 'badge badge-danger';
                        statusText = 'TO-DO';
                    } else if (data === 'IMPORTANT') {
                        badgeClass = 'badge badge-success';
                        statusText = 'IMPORTANT';
                    } 

                    

                    return '<span class="' + badgeClass + '">' + statusText + '</span>';
                }
                        },






                        {
                            "data": "created_at",
                            "name": "created_at"
                        },
                        {
                            "data": "action",
                            orderable: false,
                            searchable: false,
                            visible: true
                        },
                    ],
                    "columnDefs": [{
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            },
                            "targets": 0,
                        },

                        // {
                        //     render: function(data, type, row, meta) {
                        //         return (data == 1) ? '<span class="badge badge-success">.'data'.</span>' :
                        //             '<span class="badge badge-danger">.'data'.</span>';
                        //     },
                        //     "targets": 3,
                        // }


                        {render: function (data, type, row, meta) {
                                return moment(data).format('L'); 
                            },
                            "targets": 5,
                        },
                        // {render: function (data, type, row, meta) {
                        //         return (data==1)?'<span class="badge badge-success">Enable</span>':'<span class="badge badge-danger">Disable</span>';
                        //     },
                        //     "targets":4,
                        // },
                    ],
                    "aaSorting": [],
                    // "order": [
                    //     [0, 'desc']
                    // ],
                    initComplete: (settings, json) => {
                        $('.dataTables_paginate').appendTo('#tablepagination');
                        $('.dataTables_filter').appendTo('#tableSearch');
                    },
                });
            });
            </script>

    @endpush
@endsection