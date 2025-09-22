<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = "26ce0b8c-c37c-4f79-926c-aa03af692886";

        DB::table('users')->insert([
            'id' => $uuid,
            'name' => 'Admin',
            'email' => 'admin@geolar.com.br',
            'password' => Hash::make('1234567')
        ]);
    }
}
