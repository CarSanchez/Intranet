<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'sa',
        ]);

        Role::create([
            'role' => 'admin',
        ]);

        Role::create([
            'role' => 'user',
        ]);

        Role::create([
            'role' => 'inv',
        ]);
    }
}
