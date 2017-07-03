<?php

use Illuminate\Database\Seeder;
use App\Http\Models;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            [
                'name' => 'kiev'
            ],
            [
                'name' => 'lviv'
            ],
            [
                'name' => 'odessa'
            ]
        ]);
    }
}
