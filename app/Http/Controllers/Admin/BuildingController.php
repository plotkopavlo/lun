<?php

namespace App\Http\Controllers\Admin;

use App\Services\GeocodingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BuildingRepository;
use App\Repositories\ResidentialComplexRepository as ComplexRepository;

class BuildingController extends Controller
{

    private $building;
    private $complex;

    public function __construct(ComplexRepository $complex, BuildingRepository $building) {

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
        $buildings = $this->building
            ->with(['residentialComplex'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.buildings.index', [
            'buildings' => $buildings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complexes = $this->complex->getAssocArray('id', 'name');

        return view('admin.buildings.create', [
            'complexes' => $complexes
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
        $city    = isset($complex->city) ? $complex->city->name : '';

        $buildingName    = $request->name;
        $buildingAddress = $request->address;

        $geocode     = new GeocodingService();

        $coordinates = $geocode->getCoordinatesByAddress("$city, $buildingAddress");

        $building = $this->building->create([
            'name'    => $buildingName,
            'address' => $buildingAddress,
            'lat'     => $coordinates->lat,
            'lon'     => $coordinates->lon
        ]);

        //TODO: put in repository assoc
        $building->residentialComplex()->associate($complex);
        $building->save();

        return redirect('panel/buildings')
            ->with('status', "Building $buildingName created!")
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building  = $this->building->find($id);
        $complexes = $this->complex->getAssocArray('id', 'name');

        $selectedComplex = isset($building->residentialComplex->id) ?
            $building->residentialComplex->id : null;

        return view('admin.buildings.edit', [
            'building'        => $building,
            'complexes'       => $complexes,
            'selectedComplex' => $selectedComplex
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
        $complex = $this->complex->find($request->complex);
        $city    = isset($complex->city) ? $complex->city->name : '';

        $buildingName    = $request->name;
        $buildingAddress = $request->address;

        $geocode     = new GeocodingService();
        $coordinates = $geocode->getCoordinatesByAddress("$city, $buildingAddress");

        $this->building->update([
            'name'    => $buildingName,
            'address' => $buildingAddress,
            'lat'     => $coordinates->lat,
            'lon'     => $coordinates->lon
        ], $id);

        //TODO: put in repository assoc
        $building = $this->building->find($id);
        $building->residentialComplex()->associate($complex);
        $building->save();

        return redirect('panel/buildings')
            ->with('status', "Building $buildingName updated!")
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
        $building     = $this->building->find($id);
        $buildingName = $building->name;

        $this->building->delete($building->id);

        return redirect('panel/buildings')
            ->with('status', "Building $buildingName deleted!")
        ;
    }
}
