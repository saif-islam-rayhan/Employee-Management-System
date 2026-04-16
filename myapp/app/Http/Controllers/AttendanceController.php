<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::with('user', 'attendances')->get();
        $attendanceStatuses = Attendance::getStatuses();
        
        return view('admin.attendance.index', compact('employees', 'attendanceStatuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,leave,late',
        ]);

        $existingAttendance = Attendance::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->first();

        if ($existingAttendance) {
            $existingAttendance->update(['status' => $request->status]);
            return back()->with('success', 'Attendance updated successfully!');
        }

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Attendance marked successfully!');
    }
}
