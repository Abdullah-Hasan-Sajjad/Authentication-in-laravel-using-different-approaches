<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminObj = new Admin();
        $adminObj->name = 'Admin Rafi';
        $adminObj->email = 'adminRafi@gmail.com';
        $adminObj->password = Hash::make('123456789');
        $adminObj->save();

    }
}
