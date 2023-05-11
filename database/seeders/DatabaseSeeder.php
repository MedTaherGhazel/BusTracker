<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Voyage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'Driver']);
        Role::create(['name' => 'Admin']);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 3
        ]);
        User::create([
            'name' => 'Driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);

    }
}
