<?php

namespace App\Http\Controllers;

use App\Repositories\FlatRepository;
use App\Http\Models\Flat;
use App\Repositories\FlatTypeRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use App\Repositories\Criteria\Flat\SortByPriceMin;
use App\Repositories\Criteria\Flat\SortByPriceMax;
use Illuminate\Support\Facades\DB;
use App\Services\InstagramService;


class RestAPI extends Controller
{

    protected $city;
    protected $flat;

    public function __construct(Flat $flat, FlatRepository $flatR, CityRepository $city, InstagramService $instagram)
    {
        $this->flat = $flat;
        $this->flatR = $flatR;
        $this->city = $city;
        $this->instagram = $instagram;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFlats(Request $request)
    {

        $cityID = 0;
        $rooms  = 0;

        // TODO: use one method
        $flats = $this->flat->newQuery();

        if ($request->rooms) {
            //$flats->pushCriteria(new sampleRooms($rooms));
            $flats->where('num_of_rooms', $request->rooms);
        }

        if ($request->cityID) {
//            $flats->pushCriteria(new sampleCity($cityID));
            $flats->where('city_id', $request->cityID);
        }

        $flats->with(['buildings', 'city']);
        $flats = $flats->paginate(10);

        foreach ($flats as $flat) {
            $flat->residential_complex = $flat->buildings[0]->residentialComplex;
            $flat->updated = $flat->updated_at->diffForHumans();
        }

        return response()->json( [
            'cityID' => $cityID,

            'rooms'  => $rooms,

            'flats'  => $flats,
        ]);
    }

    public function instagram(Request $request)
    {
       $this->instagram->getImagesByID(1708129225);
    }

    public function getFlat($id)
    {
        $flat =  $this->flatR->find($id);
        $flat->with(['buildings', 'city']);
        $flat->get();
        $flat->buildings;
        $flat->city;
        $flat->updated = $flat->updated_at->diffForHumans();

        return response()->json($flat);
    }

    public function getSearchCriteria(Request $request)
    {
        $cities  = $this->city->all();
        $roomMax = $this->flatR->getMaxRooms();

        return response()->json( [
            'cities'  => $cities,
            'roomsMax' => $roomMax
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
