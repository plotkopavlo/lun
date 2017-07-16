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
            'name' => 'Lun test user',
            'email' => 'lun@lun.ua',
            'password' => bcrypt('qwerty'),
        ]);
    }
}
