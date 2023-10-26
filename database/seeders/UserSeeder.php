<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */


    public function run(): void {

        $medewerkerUser = [
            'name' => 'testuser',
            'email' => 'test@test.com',
            'password' => Hash::make('testpassword123'),
        ];

        $adminUser = [
            'name' => 'testadmin',
            'email' => 'testadmin@test.com',
            'password' => Hash::make('testpassword123'),
        ];
        // Create an admin user

        $createdAdminRole = Role::create(['name' => 'admin', 'created_at' => Carbon::now()]);
        $createdMedewerkerRol = Role::create(['name' => 'medewerker', 'created_at' => Carbon::now()]);


        // Create admin user
        User::factory($adminUser)
            ->hasAttached($createdAdminRole)
            ->create();

        // Create medewerker user
        User::factory($medewerkerUser)
            ->hasAttached($createdMedewerkerRol)
            ->create();

        // Create some random users as well
        User::factory()->count(10)->create();
    }
}
