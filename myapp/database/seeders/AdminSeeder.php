<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create Employee Users with associated Employee records
        $employees = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+1 (555) 123-4567',
                'department' => 'Development',
                'position' => 'Senior Developer',
                'join_date' => '2023-01-15',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '+1 (555) 234-5678',
                'department' => 'Design',
                'position' => 'UI/UX Designer',
                'join_date' => '2023-02-20',
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'phone' => '+1 (555) 345-6789',
                'department' => 'Marketing',
                'position' => 'Marketing Manager',
                'join_date' => '2023-03-10',
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@example.com',
                'phone' => '+1 (555) 456-7890',
                'department' => 'Human Resources',
                'position' => 'HR Specialist',
                'join_date' => '2023-04-05',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'phone' => '+1 (555) 567-8901',
                'department' => 'Development',
                'position' => 'Junior Developer',
                'join_date' => '2024-01-10',
            ],
        ];

        foreach ($employees as $employeeData) {
            $user = User::create([
                'name' => $employeeData['name'],
                'email' => $employeeData['email'],
                'password' => Hash::make('password123'),
                'role' => 'employee',
            ]);

            Employee::create([
                'user_id' => $user->id,
                'phone' => $employeeData['phone'],
                'department' => $employeeData['department'],
                'position' => $employeeData['position'],
                'join_date' => $employeeData['join_date'],
            ]);
        }
    }
}
