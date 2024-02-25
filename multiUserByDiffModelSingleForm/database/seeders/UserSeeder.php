<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userObj = new User();
        $userObj->name = 'User Rafi';
        $userObj->email = 'userRafi@gmail.com';
        $userObj->password = Hash::make('123456789');
        $userObj->save();

    }
}
