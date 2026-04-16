@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>My Attendance History</h2>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">{{ $attendances->total() }}</div>
            <div class="dashboard-card-label">Total Records</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">
                {{ $employee->attendances->where('status', 'present')->count() }}
            </div>
            <div class="dashboard-card-label">Present</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">
                {{ $employee->attendances->where('status', 'absent')->count() }}
            </div>
            <div class="dashboard-card-label">Absent</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="dashboard-card-value">
                {{ $employee->attendances->where('status', 'leave')->count() }}
            </div>
            <div class="dashboard-card-label">Leave</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="bi bi-calendar-check"></i> Attendance Records
    </div>
    <div class="card-body">
        @if($attendances->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Marked On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->date->format('d M Y (l)') }}</td>
                                <td>
                                    @if($attendance->status === 'present')
                                        <span class="badge bg-success">{{ ucfirst($attendance->status) }}</span>
                                    @elseif($attendance->status === 'absent')
                                        <span class="badge bg-danger">{{ ucfirst($attendance->status) }}</span>
                                    @elseif($attendance->status === 'leave')
                                        <span class="badge bg-warning">{{ ucfirst($attendance->status) }}</span>
                                    @else
                                        <span class="badge bg-info">{{ ucfirst($attendance->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ $attendance->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation">
                {{ $attendances->links() }}
            </nav>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No attendance records found.
            </div>
        @endif
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('employee.dashboard') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Dashboard
    </a>
</div>
@endsection
