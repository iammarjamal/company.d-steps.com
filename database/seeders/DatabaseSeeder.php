<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call(RolesAndPermissionsSeeder::class);

        $firstAdmin = User::create([
            'username' => 'Admin One',
            'email' => 'admin1@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        $secondAdmin = User::create([
            'username' => 'Admin Two',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        $firstAdmin->assignRole(Role::Admin);
        $secondAdmin->assignRole(Role::Admin);
    }
}
