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
            'desc' => 'Este rol representa todos los permisos sobre los demás roles.'
        ]);

        Role::create([
            'role' => 'admin',
            'desc' => 'Este rol representa algunos permisos de contenido.'
        ]);

        Role::create([
            'role' => 'user',
            'desc' => 'Este rol representa de solo lectura sin algún permiso de modificación.'
        ]);

        Role::create([
            'role' => 'inv',
            'desc' => 'Este rol representa de solo lectura y no tiene ningu privilegio de usuario.'
        ]);
    }
}
