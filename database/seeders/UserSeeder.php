<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'John Arcila Castano',
            'email' => 'test@example.com',
            'password' => bcrypt('admin2021')
        ]);

        User::factory(99)->create();
    }
}
