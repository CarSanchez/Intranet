<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sa',
            'lastName' => 'admin',
            'date' => date('Y-m-d H:i:s'),
            'route_img' => '',
            'email' => 'sa@pintumex.com.mx',
            'ext' => '0000',
            'user' => 'sa',
            'department_id' => 1,
            'password' => bcrypt('Intr@net19'),
            'active' => '1',
            'role_id' => 1,
            'notes' => 'This user is the super administrator with all permissions',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Agustín',
            'lastName' => 'Feregrino',
            'date' => date('Y-m-d H:i:s'),
            'route_img' => '',
            'email' => 'program2@pintumex.com.mx',
            'ext' => '1127',
            'user' => 'program2',
            'department_id' => 1,
            'password' => bcrypt('kklaus'),
            'active' => '1',
            'role_id' => 1,
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Carmen',
            'lastName' => 'Sanchez Cruz',
            'date' => '1995-07-16',
            'route_img' => '',
            'email' => 'sistem@pintumex.com.mx',
            'ext' => '1123',
            'user' => 'sistemas1',
            'department_id' => 1,
            'password' => bcrypt('Sistemas1'),
            'active' => '1',
            'role_id' => 1,
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Alejandro',
            'lastName' => 'Hernandez Bravo',
            'date' => '1979-12-26',
            'route_img' => '',
            'email' => 'soporteti@pintumex.com.mx',
            'ext' => '1125',
            'user' => 'sistemas2',
            'department_id' => 1,
            'password' => bcrypt('Sistemas2'),
            'active' => '1',
            'role_id' => 1,
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Carlos',
            'lastName' => 'Santos Palacios',
            'date' => date('Y-m-d H:i:s'),
            'route_img' => '',
            'email' => 'asistemas@pintumex.com.mx',
            'ext' => '1126',
            'user' => 'sistemas3',
            'department_id' => 1,
            'password' => bcrypt('p@ssword'),
            'active' => '1',
            'role_id' => 1,
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        factory(User::class)->times(1)->create([
            'active' => true,
        ]);

        factory(User::class)->times(1)->create([
            'password' => '$2y$10$OW4wSONu2ZNvf4pnbdrQ3uuJklE4oaZ3QVooH89nNvqKj07PNKT7K', //secret2
            'active' => false,
            'role_id' => 3,
            'notes' => 'This user is the a user with position user',
        ]);
    }
}
