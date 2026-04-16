@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Attendance Management</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-calendar-plus"></i> Mark Attendance
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('attendance.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Employee</label>
                        <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
                            <option value="">Select an employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->user->name }} ({{ $employee->position }})
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                            value="{{ old('date', date('Y-m-d')) }}" required>
                        @error('date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">Select status</option>
                            @foreach($attendanceStatuses as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-check-circle"></i> Mark Attendance
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="bi bi-list"></i> Attendance Records
    </div>
    <div class="card-body">
        @if($employees->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Total Records</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Leave</th>
                            <th>Late</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            @php
                                $total = $employee->attendances->count();
                                $present = $employee->attendances->where('status', 'present')->count();
                                $absent = $employee->attendances->where('status', 'absent')->count();
                                $leave = $employee->attendances->where('status', 'leave')->count();
                                $late = $employee->attendances->where('status', 'late')->count();
                            @endphp
                            <tr>
                                <td>{{ $employee->user->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $total }}</td>
                                <td><span class="badge bg-success">{{ $present }}</span></td>
                                <td><span class="badge bg-danger">{{ $absent }}</span></td>
                                <td><span class="badge bg-warning">{{ $leave }}</span></td>
                                <td><span class="badge bg-info">{{ $late }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No employees found.
            </div>
        @endif
    </div>
</div>
@endsection
