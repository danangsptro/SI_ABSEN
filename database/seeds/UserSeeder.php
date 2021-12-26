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
            'password' => Hash::make('staff12')
        ]);
        DB::table('users')->insert([
            'name' => 'guru1',
            'user_role' => 'guru',
            'email' => 'guru1@email.com',
            'password' => Hash::make('guru1')
        ]);
        DB::table('users')->insert([
            'name' => 'guru2',
            'user_role' => 'guru',
            'email' => 'guru2@email.com',
            'password' => Hash::make('guru2')
        ]);
        DB::table('users')->insert([
            'name' => 'guru3',
            'user_role' => 'guru',
            'email' => 'guru3@email.com',
            'password' => Hash::make('guru3')
        ]);
    }
}
