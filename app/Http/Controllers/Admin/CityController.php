<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\CityRepository;

class CityController extends Controller
{
    private $city;

    public function __construct(CityRepository $city) {

        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->city->paginate(15);

        return view('admin.cities.index', [
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cityName = $request->name;

        $this->city->create([
            'name' => $cityName
        ]);

        return redirect('panel/cities')
            ->with('status', "City $cityName created!")
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', [
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $newName = $request->name;

        $this->city->update([
            'name' => $newName
        ], $city->id);

        return redirect('panel/cities')
            ->with('status', "City $newName updated!")
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $cityName = $city->name;

        $this->city->delete($city->id);

        return redirect('panel/cities')
            ->with('status', "City $cityName deleted!")
        ;
    }
}
