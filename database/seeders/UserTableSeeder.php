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
            'email'     => 'admin@example.com',
            'password'  => bcrypt('password'),
            'score'     => "0",
            'type'      => User::ADMIN,
        ]);

        User::factory()->create([
            'name'      => 'John Doe',
            'email'     => 'john@example.com',
            'password'  => bcrypt('password'),
            'score'     => "0",
            'type'      => User::AGENT,
        ]);
    }
}
