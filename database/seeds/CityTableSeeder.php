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
        factory(Models\City::class, 50)->create()->each(function ($city) {
            $city->residentialComplexes()->save(factory(Models\ResidentialComplex::class)->make());
        });
    }
}
