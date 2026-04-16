@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Admin Dashboard</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $totalEmployees }}</div>
            <div class="dashboard-card-label">Total Employees</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $totalUsers }}</div>
            <div class="dashboard-card-label">Total Users</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $totalAttendanceRecords }}</div>
            <div class="dashboard-card-label">Attendance Records</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $presentToday }}</div>
            <div class="dashboard-card-label">Present Today</div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-people"></i> Quick Actions
            </div>
            <div class="card-body">
                <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm mb-2 w-100">
                    <i class="bi bi-list"></i> View All Employees
                </a>
                <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm mb-2 w-100">
                    <i class="bi bi-plus-circle"></i> Add New Employee
                </a>
                <a href="{{ route('attendance.index') }}" class="btn btn-info btn-sm w-100">
                    <i class="bi bi-calendar-check"></i> Manage Attendance
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle"></i> System Information
            </div>
            <div class="card-body">
                <p><strong>Application:</strong> Employee Management System</p>
                <p><strong>Version:</strong> 1.0</p>
                <p><strong>Current User:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Last Login:</strong> Today</p>
            </div>
        </div>
    </div>
</div>
@endsection