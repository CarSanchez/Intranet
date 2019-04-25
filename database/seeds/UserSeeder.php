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
            'email' => 'program2@pintumex.com.mx',
            'user' => 'sa',
            'password' => bcrypt('Intr@net19'),
            'active' => '1',
            'role' => 'sa',
            'notes' => 'This user is the super administrator with all permissions',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Carmen',
            'lastName' => 'Sanchez Cruz',
            'date' => '1995-07-16',
            'route_img' => '',
            'email' => 'sistem@pintumex.com.mx',
            'user' => 'sistemas1',
            'password' => bcrypt('Sistemas1'),
            'active' => '1',
            'role' => 'sa',
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Alejandro',
            'lastName' => 'Hernandez Bravo',
            'date' => '1979-12-26',
            'route_img' => '',
            'email' => 'soporteti@pintumex.com.mx',
            'user' => 'sistemas2',
            'password' => bcrypt('Sistemas2'),
            'active' => '1',
            'role' => 'sa',
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        User::create([
            'name' => 'Carlos',
            'lastName' => 'Santos Palacios',
            'date' => date('Y-m-d H:i:s'),
            'route_img' => '',
            'email' => 'asistemas@pintumex.com.mx',
            'user' => 'sistemas3',
            'password' => bcrypt('p@ssword'),
            'active' => '1',
            'role' => 'sa',
            'notes' => 'This user is the admin with permissions of sa',
            /*'remember_token' => Str::random(10),*/
        ]);

        factory(User::class)->times(1)->create([
            'active' => true,
        ]);

        factory(User::class)->times(1)->create([
            'password' => '$2y$10$OW4wSONu2ZNvf4pnbdrQ3uuJklE4oaZ3QVooH89nNvqKj07PNKT7K', //secret2
            'active' => false,
            'role' => 'user',
            'notes' => 'This user is the a user with position user',
        ]);
    }
}
