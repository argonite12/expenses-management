<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::create([
            'name'          => 'Administrator',
            'description'   => 'Full Access'            
        ]);

        User::create([
            'username'  => 'admin',
            'fname'     => 'Admin',
            'lname'     => 'Admin',
            'email'     => 'admin@test.com',
            'password'  => \Hash::make('admin'),
            'role_id'   => 1
        ]);
    }
}
