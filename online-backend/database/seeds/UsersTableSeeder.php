<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => Str::random(7),
            'lastName' => Str::random(7),
            'email' => Str::random(7).'@gmail.com',
            'password' => bcrypt('password'),
            'url' => Str::random(10),
            'role' => Str::random(5)
        ]);
    }
}
