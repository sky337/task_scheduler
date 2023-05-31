@extends('inventory.layout') 
@section('title', 'Add Product')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Task</h5>
                            
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
                                <a href="#">Edit Task</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{route('task.update',$tasks->id)}}">
                        {{-- <input type="hidden" name="_token" value="R7Ddbbgxb1qEbQoTDakkow75fNl3gqY3q3qkjl94">  --}} 
                        @csrf
                        @method('PUT')
                                <div class="row"> 
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="title" value="{{$tasks->title}}" placeholder="Enter product title" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea   name="details" class="form-control html-editor h-205" rows="10">{{$tasks->details}}</textarea>    
                                    </div>

                                    <div class="form-group">
                                    <select  class="form-control" name="status" id="status">
                                        <option value="PENDING"{{ $tasks->status == 'PENDING' ? ' selected' : '' }}>Pending</option>
                                        <option value="COMPLETED"{{ $tasks->status == 'COMPLETED' ? ' selected' : '' }}>Completed</option>
                                        <option value="IN_PROGRESS"{{ $tasks->status == 'IN_PROGRESS' ? ' selected' : '' }}>In Progress</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select  class="form-control" name="type" id="type">
                                        <option value="TO-DO"{{$tasks->type == 'TO-DO' ? ' selected' : '' }}>To Do Task</option>
                                        <option value="IMPORTANT"{{ $tasks->type == 'IMPORTANT' ? ' selected' : '' }}>Important task</option>
                                    </select>
                                </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                               
                                </div>
                                    
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection