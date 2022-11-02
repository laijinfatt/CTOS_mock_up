<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'      => 'Admin',
            'username'  => 'admin',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('password'),
            'type'      => User::ADMIN,
            'permission'=> 1,
        ]);

        User::factory()->create([
            'name'      => 'John Doe',
            'username'  => 'johndoe',
            'email'     => 'john@example.com',
            'password'  => bcrypt('password'),
            'ic'        => '001023-01-2347',
            'handphone_number' => '011-12340912',
            'gender'    => 'Male',
            'type'      => User::AGENT,
            'permission'=> 1,
        ]);
    }
}
