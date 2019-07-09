@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-8">
    
            <div class="card">
            
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="font-weight-bold mb-0">
                            Task Lists
                        </p>
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                            Task Lists
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="font-weight-bold">
                        {{ $task->title }}
                        @if($task->status)
                            <span class="badge badge-success">Done</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif 
                    </h3>
        
                    <p class="text-justify mt-3" tabindex="0">
                        {{ $task->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
