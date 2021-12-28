<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'staff',
            'user_role' => 'staff',
            'email' => 'staff@email.com',
            'jenis_kelamin' => 'Laki-laki',
            'password' => Hash::make('qwerty')
        ]);
        DB::table('users')->insert([
            'name' => 'guru1',
            'user_role' => 'guru',
            'email' => 'guru1@email.com',
            'jenis_kelamin' => 'Laki-laki',
            'password' => Hash::make('qwerty')
        ]);
        DB::table('users')->insert([
            'name' => 'guru2',
            'user_role' => 'guru',
            'email' => 'guru2@email.com',
            'jenis_kelamin' => 'Laki-laki',
            'password' => Hash::make('qwerty')
        ]);
        DB::table('users')->insert([
            'name' => 'guru3',
            'user_role' => 'guru',
            'email' => 'guru3@email.com',
            'jenis_kelamin' => 'Perempuan',
            'password' => Hash::make('qwerty')
        ]);
    }
}
