<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);

        \App\Models\User::create([
            'name' => 'Super Administrador',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
          ])->assignRole('Admin');

          User::factory(20)->create();

    }
}
