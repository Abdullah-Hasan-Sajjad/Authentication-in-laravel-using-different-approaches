<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminObj = new SuperAdmin();
        $superAdminObj->name = 'Super Admin Rafi';
        $superAdminObj->email = 'superAdminRafi@gmail.com';
        $superAdminObj->password = Hash::make('123456789');
        $superAdminObj->save();
    }
}
