<?php

namespace App\Http\Controllers;

use App\Repositories\FlatRepository;
use App\Repositories\FlatTypeRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use App\Repositories\Criteria\Flat\SortByPrice;
use Illuminate\Support\Facades\DB;

class RestAPI extends Controller
{

    protected $city;
    protected $flat;

    public function __construct(FlatRepository $flat,CityRepository $city)
    {
        $this->flat = $flat;
        $this->city = $city;
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

        if( $request->searchCriteria){
            dd($request->searchCriteria);
            $cityID = $request->searchCriteria->city ? $request->city : 0;
            $rooms = $request->searchCriteria->rooms ? $request->rooms : 0;
        }
//        $sort  = $request->sort ? $request->sort : null;
//
//        // TODO: use one method
//        if ($sort.type == "price") {
//            $this->flat->pushCriteria(new SortByPrice());
//        }

        $flats = $this->flat;


//        if ($rooms) {
//            $flats->findWhere(['num_of_rooms' => $rooms]);
//        }
//
//        if ($cityID) {
//            $flats->findWhere(['city_id' => $cityID]);
//        }


        $flats = $flats->paginate(2);
        foreach ($flats as $flatOne){
            $flatOne->residential_complex = $flatOne->buildings()->first()->residentialComplex;
            $flatOne->buildings =$flatOne->buildings()->get();
            $flatOne->updated = $flatOne->updated_at->diffForHumans();

            $flatOne->cityID = $flatOne->city;
            $flatOne->city = $flatOne->city->name;

            $flatOne->price_total = $flatOne->price_per_m2*$flatOne->area_m2;
        }

        return response()->json( [
            'cityID' => $cityID,
            'rooms'  => $rooms,

            'flats'  => $flats,
            'total'  => $flats->total()
        ]);
    }

    public function getSearchCriteria(Request $request)
    {


        return response()->json( [
            'citiesID' => $citiesID,
            'roomsMax'  => $roomsMax,
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
