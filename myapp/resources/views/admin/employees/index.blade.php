@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Employee Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('employees.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add New Employee
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="bi bi-list"></i> Employees List
    </div>
    <div class="card-body">
        @if($employees->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Join Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->user->name }}</td>
                                <td>{{ $employee->user->email }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->join_date->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('employees.delete', $employee->id) }}"
                                        style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No employees found. <a href="{{ route('employees.create') }}">Add one now</a>
            </div>
        @endif
    </div>
</div>
@endsection