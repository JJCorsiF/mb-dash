<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        $masterPassword = Hash::make('#KeEpItSeCr3t');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mbdash.com',
            'password' => $masterPassword,
        ]);

        for ($i = 0; $i < 10; $i++) {
            $password = Hash::make('#KeEpItSeCr3t' . $i);
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
