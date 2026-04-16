<aside class="sidebar">
    <div class="p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
        <h5 class="mb-0">
            <i class="bi bi-briefcase"></i> EMS
        </h5>
    </div>

    @if(auth()->user()->isAdmin())
        <!-- Admin Sidebar -->
        <nav class="mt-2">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('employees.index') }}" class="nav-link">
                <i class="bi bi-people"></i>
                <span>Employees</span>
            </a>
            <a href="{{ route('attendance.index') }}" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span>Attendance</span>
            </a>
        </nav>
    @else
        <!-- Employee Sidebar -->
        <nav class="mt-2">
            <a href="{{ route('employee.dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('employee.profile') }}" class="nav-link">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('employee.attendance') }}" class="nav-link">
                <i class="bi bi-calendar-check"></i>
                <span>Attendance</span>
            </a>
        </nav>
    @endif
</aside>