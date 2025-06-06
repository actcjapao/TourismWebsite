<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'firstname' => 'Admin',
            'lastname' => 'Dev',
            'usertype' => 'admin',
            'username' => 'admin',
            'password' => Hash::make("admin@d3v")
        ]);

        Account::create([
            'firstname' => 'Manager',
            'lastname' => 'Dev',
            'usertype' => 'manager',
            'username' => 'manager',
            'password' => Hash::make("manager@d3v")
        ]);
    }
}
