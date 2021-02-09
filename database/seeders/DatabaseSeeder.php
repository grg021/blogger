<?php

namespace Database\Seeders;

use App\Models\User;
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
         User::factory()->create([
             'name' => 'System Admin',
             'username' => 'admin',
             'email' => 'system.admin@email.com',
             'password' => bcrypt('Asdf1234')
         ]);
         $this->call(UserSeeder::class);
    }
}
