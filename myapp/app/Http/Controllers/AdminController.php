<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalEmployees = Employee::count();
        $totalUsers = User::count();
        $totalAttendanceRecords = Attendance::count();
        $presentToday = Attendance::where('date', today())->where('status', 'present')->count();

        return view('admin.dashboard', compact('totalEmployees', 'totalUsers', 'totalAttendanceRecords', 'presentToday'));
    }
}
