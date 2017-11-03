<?php

namespace App\Http\Controllers;

use App\Repositories\FlatRepository;
use Illuminate\Http\Request;
use App\Repositories\Criteria\Flat\SortByPriceMin;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    protected $city;
    protected $flat;

    public function __construct(FlatRepository $flat)
    {
        $this->flat = $flat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cityID = $request->city  ? $request->city  : null;
        $rooms  = $request->rooms ? $request->rooms : null;

//        $this->flat->pushCriteria(new SortByPrice());

        $flats = $this->flat;

        if ($rooms) {
            $flats->findWhere(['num_of_rooms' => $rooms]);
        }

        if ($cityID) {
            $flats->findWhere(['city_id' => $cityID]);
        }

        $flats = $flats->paginate(2);

        return view('welcome', [
            'cityID' => $cityID,
            'rooms'  => $rooms,

            'flats'  => $flats,
            'total'  => $flats->total()
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
