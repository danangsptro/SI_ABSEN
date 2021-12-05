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
    }
}
