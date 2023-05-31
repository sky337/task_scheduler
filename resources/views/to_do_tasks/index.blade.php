@extends('layouts.main') 
@section('title', 'Taskboard')
@section('content')
@push('head')
<style>.flash-message {
    padding: 10px;
    margin-bottom: 10px;
    background-color: #3dc265;
    color: #333;
}</style>
@endpush

    <div class="container-fluid" id="flash-message-container">
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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Apps')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Taskboard')}}</li>
                        </ul>
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
                    <div class="card-body todo-task" data-status="PENDING">
                        <div class="dd">
                            <ul class="dd-list">
                                @php $i=0;
                                   
                                    @endphp
                                @foreach ($todo as $key => $value)
                                @php $i++ @endphp
                                    <li class="dd-item" data-id="{{$value->id}}" data-status="PENDING">
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
                            </ul>
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
                    <div class="card-body progress-task" data-status="IN_PROGRESS">
                        <div class="dd">
                            <ul class="dd-list">
                                @php $i=0;
                                   
                                    @endphp
                                @foreach ($inprogress as $key => $value)
                                @php $i++ @endphp
                                    <li class="dd-item" data-id="{{$value->id}}" data-status="IN_PROGRESS">
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
                            </ul>
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
                    <div class="card-body  completed-task" data-status="COMPLETED" >
                        <div class="dd">
                            <ul class="dd-list">                                   
                                @php $i=0;
                                   
                                @endphp
                            @foreach ($completed as $key => $value)
                            @php $i++ @endphp
                                <li class="dd-item" data-id="{{$value->id}}" data-status="COMPLETED">
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
               
   
    <!-- push external js -->
    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
  


<script>
  $(document).ready(function() {
    // Initialize Sortable.js for each task list
    $('.todo-task .dd-list, .progress-task .dd-list, .completed-task .dd-list').each(function() {
        Sortable.create(this, {
            group: 'taskboard',
            animation: 150,
            onEnd: handleDrop
        });
    });
});

function handleDrop(event) {
    var item = event.item; // The dragged item
    var status = $(item).closest('.card-body').data('status'); // Get the status from the closest .card-body element
    var taskId = $(item).data('id');

    // Perform actions based on the new status
    if (status === 'PENDING') {
        console.log("Task moved to the 'Todo' list");
    } else if (status === 'IN_PROGRESS') {
        console.log("Task moved to the 'In Progress' list");
    } else if (status === 'COMPLETED') {
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
    console.log('AJAX request successful');
    console.log(response);

    // Create the flash message element
    var messageContainer = $('#flash-message-container');
    var flashMessage = $('<div class="flash-message">' + response.message + '</div>');

    // Append the flash message to the container
    messageContainer.append(flashMessage);

    // Automatically remove the flash message after a certain time
    setTimeout(function() {
        flashMessage.remove();
    }, 3000); // Remove after 5 seconds (adjust the duration as needed)
},
        error: function(xhr, status, error) {
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