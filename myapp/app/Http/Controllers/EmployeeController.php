<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // Admin methods
    public function index()
    {
        $employees = Employee::with('user')->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'join_date' => 'required|date',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee',
        ]);

        Employee::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'department' => $request->department,
            'position' => $request->position,
            'join_date' => $request->join_date,
        ]);

        return redirect('/employees')->with('success', 'Employee added successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::with('user')->findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->user_id,
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'join_date' => 'required|date',
        ]);

        $employee->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $employee->update([
            'phone' => $request->phone,
            'department' => $request->department,
            'position' => $request->position,
            'join_date' => $request->join_date,
        ]);

        return redirect('/employees')->with('success', 'Employee updated successfully!');
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $user = $employee->user;

        $employee->delete();
        $user->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully!');
    }

    // Employee methods
    public function dashboard()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        // If employee record doesn't exist, create one
        if (!$employee) {
            $employee = Employee::create([
                'user_id' => auth()->id(),
                'phone' => '',
                'department' => 'Unassigned',
                'position' => 'Unassigned',
                'join_date' => now()->format('Y-m-d'),
            ]);
        }

        $totalAttendance = $employee->attendances()->count();
        $presentDays = $employee->attendances()->where('status', 'present')->count();

        return view('employee.dashboard', compact('employee', 'totalAttendance', 'presentDays'));
    }

    public function profile()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        // If employee record doesn't exist, create one
        if (!$employee) {
            $employee = Employee::create([
                'user_id' => auth()->id(),
                'phone' => '',
                'department' => 'Unassigned',
                'position' => 'Unassigned',
                'join_date' => now()->format('Y-m-d'),
            ]);
        }

        return view('employee.profile', compact('employee'));
    }

    public function attendance()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        // If employee record doesn't exist, create one
        if (!$employee) {
            $employee = Employee::create([
                'user_id' => auth()->id(),
                'phone' => '',
                'department' => 'Unassigned',
                'position' => 'Unassigned',
                'join_date' => now()->format('Y-m-d'),
            ]);
        }

        $attendances = $employee->attendances()->orderBy('date', 'desc')->paginate(15);
        return view('employee.attendance', compact('employee', 'attendances'));
    }
}
