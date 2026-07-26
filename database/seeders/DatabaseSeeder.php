<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $admin = new Admin();
       $admin->id = (string) Str::uuid();
       $admin->nom = 'Super Admin';
       $admin->email = 'admin@gmail.com';
       $admin->telephone = '0102030405';
       $admin->role = 1;
       $admin->password = Hash::make('Admin123#');
       $admin->save();
       $this->command->info("     - Super Admin créé");
    }
}
