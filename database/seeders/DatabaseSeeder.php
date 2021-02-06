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
             'email' => config('blogger.system_admin', 'greg.hermo@gmail.com'),
             'password' => bcrypt('Asdf123$')
         ]);
    }
}
