@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
        <a href="{{ url('/') }}" class="btn btn-primary mb-2">Back</a>
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->password }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td><a href="{{ route('edit.employee', $employee->id) }}">Edit</a> | <a href="{{ route('delete.employee', $employee->id) }}" onclick="return confirm('Are you sure?')">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
                                                                                          
@endsection