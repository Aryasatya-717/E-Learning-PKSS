<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Departemen;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa departemen
        $it = Departemen::create(['nama' => 'IT']);
        $hrd = Departemen::create(['nama' => 'HRD']);
        $finance = Departemen::create(['nama' => 'Finance']);

        // Admin (tanpa departemen)
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'departemen_id' => null,
        ]);

        // 9 User biasa
        User::create([
            'name' => 'User IT 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $it->id,
        ]);

        User::create([
            'name' => 'User IT 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $it->id,
        ]);

        User::create([
            'name' => 'User HRD 1',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $hrd->id,
        ]);

        User::create([
            'name' => 'User HRD 2',
            'email' => 'user4@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $hrd->id,
        ]);

        User::create([
            'name' => 'User Finance 1',
            'email' => 'user5@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $finance->id,
        ]);

        User::create([
            'name' => 'User Finance 2',
            'email' => 'user6@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $finance->id,
        ]);

        User::create([
            'name' => 'User HRD 3',
            'email' => 'user7@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $hrd->id,
        ]);

        User::create([
            'name' => 'User IT 3',
            'email' => 'user8@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'departemen_id' => $it->id,
        ]);
    }
}
