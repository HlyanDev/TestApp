@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-8">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
    
            <div class="card">
            
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="font-weight-bold mb-0">
                            Task Lists
                        </p>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                            + New Task
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- contents goes here -->
                                @forelse(Auth::user()->tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <span class="badge badge-{{ ($task->status) ? 'success' : 'warning' }}">
                                                {{ ($task->status) ? 'Done' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('tasks.show', $task->id ) }}" class="btn btn-outline-primary">Detail</a>
                                                <a href="{{ route('tasks.edit', $task->id ) }}" class="btn btn-warning">Edit</a>
                                                <a href="javascript:void(0)" onclick="document.getElementById('task_del').submit()" class="btn btn-danger">
                                                    Delete
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="task_del">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center font-weight-bold text-danger">
                                            No Records
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
