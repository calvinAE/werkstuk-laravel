<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'avatar' => '',
            'password' => Hash::make('Password!321'),
            'role' => 'admin',
            'birthday' => '2000-12-1',
            'created_at' => (new DateTime())
        ]);
    }
}
