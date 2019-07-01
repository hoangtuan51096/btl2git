<?php

namespace Database\Seeds;

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
        DB::table('users')->truncate();
        App\User::create([
            'username' => 'admin',
            'password' => bcrypt('1'),
            'email' => 'hoangtuan51096@gmail.com',
            'name' => 'Hoang tuan'
        ]);
        App\User::create([
            'username' => 'tuanha1',
            'password' => bcrypt('123456'),
            'email' => 'hoangtuan5096@gmail.com',
            'name' => 'Hoang tuan'
        ]);
        App\User::create([
            'username' => 'tuanha2',
            'password' => bcrypt('1'),
            'email' => 'anhtuan51096@gmail.com',
            'name' => 'Hoang tuan'
        ]);
    }
}
