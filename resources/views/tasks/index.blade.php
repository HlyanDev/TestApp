@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="font-weight-bold mb-0">
                            Task Lists
                        </p>
                        <a href="/tasks/create" class="btn btn-primary">
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
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- contents goes here -->
                                @foreach($tasks as $x => $task)
                                    <tr>
                                        <td>{{ $x + 1 }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="/tasks/edit/{{ $task->id }}" class="btn btn-warning">Edit</a>
                                            <a href="javascript:void(0)" onclick="document.getElementById('task_del').submit()" class="btn btn-danger">
                                                Delete
                                            </a>
                                            <form action="{{ route('task_delete') }}" method="POST" id="task_del">
                                                @csrf
                                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
