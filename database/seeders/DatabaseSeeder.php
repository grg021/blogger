<?php

namespace Database\Seeders;

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
         \App\Models\User::factory()->create([
             'name' => 'System Admin',
             'username' => 'admin',
             'email' => 'system.admin@email.com',
             'password' => bcrypt('Asdf123$')
         ]);
    }
}
