<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ResidentialComplexRepository as ComplexRepository;
use App\Repositories\CityRepository;

class ResidentialComplexController extends Controller
{

    private $complex;
    private $city;

    public function __construct(ComplexRepository $complex, CityRepository $city) {

        $this->complex = $complex;
        $this->city    = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexes = $this->complex
            ->with(['city'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.complexes.index', [
            'complexes' => $complexes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = $this->city->all();

        $citiesAssoc = [];
        foreach ($cities as $city)
        {
            $citiesAssoc[$city->id] = $city->name;
        }

        return view('admin.complexes.create', [
            'cities' => $citiesAssoc
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
        $complexName = $request->name;

        $complex = $this->complex->create([
            'name' => $complexName
        ]);

        //TODO: put in repository assoc
        $city = $this->city->find($request->city);

        $complex->city()->associate($city);
        $complex->save();

        return redirect('panel/complexes')
            ->with('status', "Complex $complexName created!")
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
        $complex = $this->complex->find($id);
        $cities  = $this->city->all();

        $citiesAssoc = [];
        foreach ($cities as $city)
        {
            $citiesAssoc[$city->id] = $city->name;
        }

        $selectedCity = isset($complex->city->id) ? $complex->city->id : null;

        return view('admin.complexes.edit', [
            'complex'      => $complex,
            'cities'       => $citiesAssoc,
            'selectedCity' => $selectedCity
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
        $newName = $request->name;

        $this->complex->update([
            'name' => $newName
        ], $id);

        //TODO: put in repository assoc
        $complex = $this->complex->find($id);
        $city    = $this->city->find($request->city);

        $complex->city()->associate($city);
        $complex->save();

        return redirect('panel/complexes')
            ->with('status', "Complex $newName updated!")
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
        $complex     = $this->complex->find($id);
        $complexName = $complex->name;

        $this->complex->delete($complex->id);

        return redirect('panel/complexes')
            ->with('status', "Complex $complexName deleted!")
            ;
    }
}
