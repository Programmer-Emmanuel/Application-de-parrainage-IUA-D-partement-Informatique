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
       $admin->nom = 'Emmanuel Bamidélé';
       $admin->email = 'marcbamidele@gmail.com';
       $admin->telephone = '0140022693';
       $admin->role = 1;
       $admin->password = Hash::make('180305abc');
       $admin->save();
       $this->command->info("     - Super Admin créé");
    }
}
