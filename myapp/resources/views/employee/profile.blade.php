@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>My Profile</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person-vcard"></i> Employee Information
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Name</h6>
                        <p class="fs-5">{{ $employee->user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Email</h6>
                        <p class="fs-5">{{ $employee->user->email }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Position</h6>
                        <p class="fs-5">{{ $employee->position }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Department</h6>
                        <p class="fs-5">{{ $employee->department }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Phone Number</h6>
                        <p class="fs-5">{{ $employee->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Join Date</h6>
                        <p class="fs-5">{{ $employee->join_date->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Account Created</h6>
                        <p class="fs-5">{{ $employee->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Last Updated</h6>
                        <p class="fs-5">{{ $employee->updated_at->format('d M Y') }}</p>
                    </div>
                </div>

                <hr>

                <a href="{{ route('employee.dashboard') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection