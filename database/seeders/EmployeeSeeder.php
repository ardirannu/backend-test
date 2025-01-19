<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contractTypes = ['PKWT', 'PKWTT', 'Outsourcing'];

        Employee::factory(1000)->create()->each(function ($employee) use ($contractTypes) {
            Contract::create([
                'employee_id' => $employee->id,
                'type_kontrak' => $contractTypes[array_rand($contractTypes)],
                'start_date' => now()->subMonths(rand(1, 12)),
                'end_date' => now()->addMonths(rand(1, 24)),
            ]);
        });
    }
}
