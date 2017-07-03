<?php

use Illuminate\Database\Seeder;

class FlatTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flat_type')->insert([
            [
                'name' => 'studio'
            ],
            [
                'name' => 'one level'
            ],
            [
                'name' => 'two level'
            ],
            [
                'name' => 'ordinary'
            ]
        ]);
    }
}
