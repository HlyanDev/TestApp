@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card">
    
                <div class="card-header">
                    New Task
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
                    <form action="{{ route('task_store') }}" method="POST">
                        
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-form-label col-sm-3 text-sm-center text-left">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="float-right">
                            <input type="submit" value="Create" class="btn btn-success">
                        </div>
                        <div class="clearfix"></div>
                        
                    </form>
                    <!-- New Form end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
