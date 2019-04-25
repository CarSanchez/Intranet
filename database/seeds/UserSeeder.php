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
            'email' => 'sa@pintumex.com.x',
            'user' => 'sa',
            'password' => bcrypt('Intr@net19'),
            'active' => '1',
            'role' => 'sa',
            'position' => 'sa',
            'notes' => 'This user is the admin with all permissions',
            /*'remember_token' => Str::random(10),*/
        ]);

        factory(User::class)->times(1)->create([
            'active' => true,
        ]);

        factory(User::class)->times(1)->create([
            'password' => '$2y$10$OW4wSONu2ZNvf4pnbdrQ3uuJklE4oaZ3QVooH89nNvqKj07PNKT7K', //secret2
            'active' => false,
            'role' => 'user',
            'position' => 'user',
            'notes' => 'This user is the a user with position user',
        ]);
    }
}
