<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $admin2 = User::create([
            'name' => 'Иисус',
            'email' => 'admin2@kluknulo.ru',
            'password' => Hash::make('admin2@kluknulo.ru'),
            'role_id' => 0
        ]);
        $user = User::create([
            'name' => 'Толя',
            'email' => 'user@kluknulo.ru',
            'password' => Hash::make('user@kluknulo.ru'),
            'role_id' => 1
        ]);
        $admin = User::create([
            'name' => 'Админ всея Руси',
            'email' => 'admin@kluknulo.ru',
            'password' => Hash::make('admin@kluknulo.ru'),
            'role_id' => 0
        ]);

    }
}
