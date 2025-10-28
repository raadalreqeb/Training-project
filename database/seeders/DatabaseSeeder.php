<?php

namespace Database\Seeders;

use App\Models\Reservations;
use App\Models\Room;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
       $this->call(RoleSeeder::class);
       User::factory(10)->create();
       Room::factory(30)->create();
       Reservations::factory(20)->create();


         User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);



    }
}
