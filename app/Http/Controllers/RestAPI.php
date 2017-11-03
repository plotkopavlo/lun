<?php

namespace App\Http\Controllers;

use App\Repositories\FlatRepository;
use App\Repositories\FlatTypeRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use App\Repositories\Criteria\Flat\SortByPriceMin;
use App\Repositories\Criteria\Flat\SortByPriceMax;
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
            $data = json_decode($request->searchCriteria);
            $cityID = $data->cityID ;
            $rooms =$data->rooms;
        }
        // TODO: use one method


        $flats = $this->flat;


        if ($rooms) {
            $flats->findWhere(['num_of_rooms' => $rooms]);
        }

        if ($cityID) {
            $flats->findWhere(['city_id' => $cityID]);
        }

        if ($request->sort) {
            $data = json_decode($request->sort);
            //TODO: Not Work

//            if ($data->type == "price") {
//                if ($data->sortIndex="asc") {
//                    $this->flat->pushCriteria(new SortByPriceMin());
//                }
//                if ($data->sortIndex="desc") {
//                    $this->flat->pushCriteria(new SortByPriceMax());
//                }
//            }
        }

        $flats = $flats->paginate(10);
        foreach ($flats as $flatOne){
            $flatOne->residential_complex = $flatOne->buildings()->first()->residentialComplex;
            $flatOne->buildings =$flatOne->buildings()->get();
            $flatOne->updated = $flatOne->updated_at->diffForHumans();

            $flatOne->city = $flatOne->city->name;

            $flatOne->price_total = $flatOne->price_per_m2*$flatOne->area_m2;
        }

        return response()->json( [
            'cityID' => $cityID,

            'rooms'  => $rooms,

            'flats'  => $flats,
        ]);
    }

    public function getSearchCriteria(Request $request)
    {
        $cities = $this->city->all();
        $roomMax= $this->flat->getMaxRooms();
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
