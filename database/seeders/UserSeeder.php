<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('user_name', 'adminZone2')->first()) {
            $user = User::create([
                'name' => 'admin',
                'user_name' => 'adminZone2',
                'password' => Hash::make('admin1234')
            ]);
        }
    }
}
