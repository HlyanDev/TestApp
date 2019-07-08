@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>
                    <h5>Store Tasks</h5>
                    <div class="text-center">
                        <a href="/tasks" class="btn btn-primary">
                            Manage Tasks
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<example-component></example-component>
@endsection
