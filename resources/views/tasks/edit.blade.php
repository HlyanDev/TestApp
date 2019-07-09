@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
            <div class="card">
                <div class="card-header">
                    Edit Task
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif



                    <!-- New Form -->
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        
                        @csrf
                        @method("PUT")

                        <div class="form-group row">
                            <label for="title" class="col-form-label pt-0 col-sm-3 text-sm-center text-left">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control {{ ( $errors->has('title') ) ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $task->title }}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label pt-0 col-sm-3 text-sm-center text-left">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-form-label pt-0 col-sm-3 text-sm-center text-left">Status</label>
                            <div class="col-sm-9">
                                @if( $task->status )
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="done" name="status" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label font-weight-bold text-success" for="done">Done</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pending" name="status" class="custom-control-input" value="0">
                                    <label class="custom-control-label font-weight-bold text-primary" for="pending">Pending</label>
                                </div>
                                @else 
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="done" name="status" class="custom-control-input" value="1">
                                    <label class="custom-control-label font-weight-bold text-success" for="done">Done</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pending" name="status" class="custom-control-input" value="0" checked>
                                    <label class="custom-control-label font-weight-bold text-primary" for="pending">Pending</label>
                                </div>
                                @endif
                                <br>
                                @if($errors->has('status'))
                                    <span class="text-danger">
                                        {{ $errors->first('status') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                        
                    </form>
                    <!-- New Form end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
