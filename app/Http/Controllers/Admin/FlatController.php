<?php

namespace App\Http\Controllers\Admin;

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
        $complex = $this->complex->find($request->complex);

        $flatName    = $request->name;

        $flatData = [
            'name'        => $flatName,
            'description' => $request->description,
            'num_of_rooms' => $request->rooms,
            'area_m2' => $request->area,
            'flat_type_id' => $request->type,

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

        $resComplexes       = $this->complex->getAssocArray('id',  'name');
        $resComplexSelected = $flat->buildings()
            ->first()
            ->residentialComplex
            ->id
        ;

        // fill form with first complex buildings
        $buildings = $flat->buildings;

        $buildingsAssoc = [];
        foreach ($buildings as $building)
        {
            $buildingsAssoc[$building->id] = $building->name;
        }

        return view('admin.flats.edit', [
            'flat'      => $flat,

            'flatPrice'     => $flatPrice,
            'flatPriceType' => $flatPriceType,

            'complexes' => $resComplexes,
            'flatTypes' => $flatTypes,
            'buildings' => $buildingsAssoc,

            'flatTypeSelected' => $flat->flat_type_id,
            'resComplexSelected' => $resComplexSelected

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
        $flat     = $this->flat->find($id);
        $flatName = $flat->name;

        $this->flat->delete($id);

        return redirect('panel/flats')
            ->with('status', "Building $flatName deleted!")
        ;
    }
}
