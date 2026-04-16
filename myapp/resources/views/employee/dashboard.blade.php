@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Welcome, {{ auth()->user()->name }}!</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $totalAttendance }}</div>
            <div class="dashboard-card-label">Total Attendance Records</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $presentDays }}</div>
            <div class="dashboard-card-label">Days Present</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $employee->department }}</div>
            <div class="dashboard-card-label">Department</div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person"></i> Employee Information
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $employee->user->name }}</p>
                <p><strong>Email:</strong> {{ $employee->user->email }}</p>
                <p><strong>Position:</strong> {{ $employee->position }}</p>
                <p><strong>Department:</strong> {{ $employee->department }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                <p><strong>Join Date:</strong> {{ $employee->join_date->format('d M Y') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-link-45deg"></i> Quick Links
            </div>
            <div class="card-body">
                <a href="{{ route('employee.profile') }}" class="btn btn-primary btn-sm mb-2 w-100">
                    <i class="bi bi-person"></i> View Full Profile
                </a>
                <a href="{{ route('employee.attendance') }}" class="btn btn-info btn-sm w-100">
                    <i class="bi bi-calendar-check"></i> View Attendance History
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
