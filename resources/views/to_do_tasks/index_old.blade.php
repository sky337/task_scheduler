@extends('layouts.main') 
@section('title', 'Taskboard')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-server bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Taskboard')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Apps')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Taskboard')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card task-board">
                    <div class="card-header">
                        <h3>{{ __('Todos')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body todo-task">
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">
                                @php $i=0;
                                   
                                    @endphp
                                @foreach ($todo as $key => $value)
                                @php $i++ @endphp
                                    <li class="dd-item" data-id="{{$i}}" data-status="pending">
                                    <div class="dd-handle">
                                        <h6>{{$value->title}}</h6>
                                        <p>{{$value->details}}</p>
                                    </div>
                                </li>
                                @endforeach
                             

                                {{-- <li class="dd-item" data-id="2">
                                    <div class="dd-handle">
                                        <h6>{{ __('New project')}}</h6>
                                        <p>{{ __('It is a long established fact that a reader will be distracted.')}}</p>
                                    </div>
                                </li>
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle">
                                        <h6>{{ __('Feed Details')}}</h6>
                                        <p>{{ __('here are many variations of passages of Lorem Ipsum available, but the majority have suffered.')}}</p>
                                    </div>
                                </li> --}}
                            </ol>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>In Progress</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body progress-task">
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">
                                @php $i=0;
                                   
                                    @endphp
                                @foreach ($inprogress as $key => $value)
                                @php $i++ @endphp
                                    <li class="dd-item" data-id="{{$i}}" data-status="inprogress">
                                    <div class="dd-handle">
                                        <h6>{{$value->title}}</h6>
                                        <p>{{$value->details}}</p>
                                    </div>
                                </li>
                                @endforeach
                                {{-- <li class="dd-item" data-id="2">
                                    <div class="dd-handle">
                                        <h6>{{ __('Meeting')}}</h6>
                                        <p>{{ __('The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero')}}</p>
                                    </div>
                                </li> --}}
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Completed</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body completed-task">
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">                                   
                                @php $i=0;
                                   
                                @endphp
                            @foreach ($completed as $key => $value)
                            @php $i++ @endphp
                                <li class="dd-item" data-id="{{$i}}" data-status="completed">
                                <div class="dd-handle">
                                   
                                    <h6>{{$value->title}}</h6>
                                    <p>{{$value->details}}</p>
                                </div>
                            </li>
                            @endforeach
                                {{-- <li class="dd-item" data-id="2">
                                    <div class="dd-handle">
                                        <h6>{{ __('Event Done')}}</h6>
                                        <p>{{ __('Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical')}}</p>
                                    </div>
                                </li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
               
   
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/nestable/jquery.nestable.js') }}"></script>
        <script src="{{ asset('js/taskboard.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Initialize the nestable plugin
                $('.dd').nestable();
                
                
                // Bind the handleDrop function to the drop event
                $('.dd').on('drop', handleDrop);
               
            });

            function handleDrop(event, ui) {
        var status = ui.helper.data('status');
       
        var taskId = ui.helper.data('id');
        // console.log(ui.helper.data('id'));
         // console.log(status);
       
        // Perform actions based on the new status
        if (status === 'pending') {
            // Task moved to the 'Todo' list
            console.log("Task moved to the 'Todo' list");
        } else if (status === 'inprogress') {
            // Task moved to the 'In Progress' list
            console.log("in");
            console.log("Task moved to the 'In Progress' list");
        } else if (status === 'completed') {
            // Task moved to the 'Completed' list
            console.log("Task moved to the 'Completed' list");
        }

        // Send an AJAX request to update the status in the database
        $.ajax({
            url: '{{ route('tasks.update-status') }}',  
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                taskId: taskId,
                status: status
               
            },
            success: function(response) {
                // Handle the response if needed
                console.log('AJAX request successful');
                 console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle the error if needed
                console.log('AJAX request failed');
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    }
        </script>
    @endpush
@endsection