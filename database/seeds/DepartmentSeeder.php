<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Sistemas',
            'desc' => 'Departamento de sistemas y soporte técnico.'
        ]);

        Department::create([
            'name' => 'Comunicación',
            'desc' => 'Departamento de comunicación y relaciones.'
        ]);
    }
}
