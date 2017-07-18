<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\FlatRepository;
use App\Repositories\BuildingRepository;
use App\Repositories\FlatTypeRepository;
use App\Repositories\ResidentialComplexRepository as ComplexRepository;

class FlatController extends Controller
{
    private $flat;
    private $flatType;
    private $building;
    private $complex;

    public function __construct(
        FlatRepository     $flat,
        FlatTypeRepository $flatType,
        ComplexRepository  $complex,
        BuildingRepository $building
    ) {

        $this->flat     = $flat;
        $this->flatType = $flatType;
        $this->complex  = $complex;
        $this->building = $building;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = $this->flat
            ->with(['buildings'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.flats.index', [
            'flats' => $flats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flatTypes    = $this->flatType->getAssocArray('id', 'name');
        $resComplexes = $this->complex->getAssocArray('id',  'name');

        // fill form with first complex buildings
        $buildings = [];
        if (reset($resComplexes)) {
            $buildings = $this->complex->find( key($resComplexes) )->buildings;
        }

        $buildingsAssoc = [];
        foreach ($buildings as $building)
        {
            $buildingsAssoc[$building->id] = $building->name;
        }

        return view('admin.flats.create', [
            'flatTypes' => $flatTypes,
            'complexes' => $resComplexes,
            'buildings' => $buildingsAssoc
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $complex = $this->complex->find($request->res_complex);
        $cityID  = isset($complex->city) ? $complex->city->id : null;

        $flatName    = $request->name;

        $flatData = [
            'name'         => $flatName,
            'description'  => $request->description,
            'num_of_rooms' => $request->rooms,
            'area_m2'      => $request->area,
            'flat_type_id' => $request->type,
            'city_id'      => $cityID
        ];

        $request->price_type == 'total' ?
            $flatData['price_total']  = $request->price :
            $flatData['price_per_m2'] = $request->price
        ;

        $flat = $this->flat->create($flatData);

        $flat->buildings()->sync($request->buildings);

        return redirect('panel/flats')
            ->with('status', "Flat $flatName created!")
        ;
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
        $flat = $this->flat->find($id);

        $flatPrice     = isset($flat->price_total) ? $flat->price_total : $flat->price_per_m2;
        $flatPriceType = isset($flat->price_total) ? 'total' : 'per_m2';

        $flatTypes    = $this->flatType->getAssocArray('id', 'name');
        $resComplexes = $this->complex->getAssocArray('id',  'name');

        /**
         * Set selected res.complex
         * @var $building Building
         */
        $resComplexSelected = $buildings = null;
        $buildingsAssoc = [];

        $building = $flat->buildings()->first();

        if (isset($building)) {
            $resComplexSelected = $building->residentialComplex;

            $buildings = $resComplexSelected->buildings;

            foreach ($buildings as $building)
            {
                $buildingsAssoc[$building->id] = $building->name;
            }
        }

        // fill form with first complex buildings
        $buildingsSelected = $flat->buildings;

        $buildingsSelectedArray = [];
        foreach ($buildingsSelected as $building)
        {
            $buildingsSelectedArray[] = $building->id;
        }

        return view('admin.flats.edit', [
            'flat'      => $flat,

            'flatPrice'     => $flatPrice,
            'flatPriceType' => $flatPriceType,

            'complexes' => $resComplexes,
            'flatTypes' => $flatTypes,
            'buildings' => $buildingsAssoc,

            'flatTypeSelected'   => $flat->flat_type_id,
            'resComplexSelected' => $resComplexSelected->id,
            'buildingsSelected'  => $buildingsSelectedArray
        ]);
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
        $complex  = $this->complex->find($request->res_complex);
        $cityID   = isset($complex->city) ? $complex->city->id : null;

        $flatName = $request->name;

        $flatData = [
            'name'         => $flatName,
            'description'  => $request->description,
            'num_of_rooms' => $request->rooms,
            'area_m2'      => $request->area,
            'flat_type_id' => $request->type,
            'city_id'      => $cityID
        ];

        if ($request->price_type == 'total') {
            $flatData['price_total']  = $request->price;
            $flatData['price_per_m2'] = null;
        } else {
            $flatData['price_total']  = null;
            $flatData['price_per_m2'] = $request->price;
        }

        $this->flat->update($flatData, $id);

        $flat = $this->flat->find($id);

        $flat->buildings()->sync($request->buildings);

        return redirect('panel/flats')
            ->with('status', "Flat $flatName updated!")
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flat     = $this->flat->find($id);
        $flatName = $flat->name;

        $this->flat->delete($id);

        return redirect('panel/flats')
            ->with('status', "Building $flatName deleted!")
        ;
    }
}
