<?php

namespace App\Http\ViewComposers;

use App\Repositories\FlatRepository;
use Illuminate\Contracts\View\View;
use App\Repositories\CityRepository;

class MainScreenFormComposer
{
    protected $city;
    protected $flat;

    public function __construct(CityRepository $city, FlatRepository $flat)
    {
        $this->city = $city;
        $this->flat = $flat;
    }

    public function compose(View $view)
    {
        $cities = $this->city->all();

        $maxRooms = $this->flat->getMaxRooms();



        $view->with([
            'cities'   => $cities,
            'maxRooms' => $maxRooms
        ]);
    }
}
