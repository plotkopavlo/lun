<?php

use Illuminate\Database\Seeder;
use App\Http\Models;

class ResidentialComplexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Models\ResidentialComplex::class, 50)->create()->each(function ($rc) {
            /**@var $rc Models\ResidentialComplex **/
            $rc->buildings()->save(factory(Models\Building::class)->make());
        });
    }
}
