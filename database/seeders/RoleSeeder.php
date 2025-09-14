<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
          DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'description' => 'System Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'receptionist', 'description' => 'Front desk employee', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'customer', 'description' => 'Hotel guest', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
