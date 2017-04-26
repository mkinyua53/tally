<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = \App\Ward::orderBy('name')->pluck('name','id');
        if (\Request::query('type') == 'create') {
            return view('stations.create')->withWard($wards);
        }
        $stations = Station::with('ward','result')->orderBy('name')->get();
        if (\Request::ajax()) {
            return view('stations.index')->withStation($stations);
        }
        return view('master.stations.index')->withStation($stations)->withWard($wards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required|unique:stations',
            'ward_id'          => 'required',
            'expected_votes'   => 'nullable|numeric|min:0',
            'spoilt'           => 'nullable|numeric|min:0',
            'valid'            => 'nullable|numeric|min:0',
            ]);

        $station = new Station;
        $station->fill($request->all());
        $station->save();

        $station->load('ward');

        // Let's add a spoilt 'aspirant' to this station to store spoilt votes
        $aspirant = new \App\Aspirant;
        $aspirant->name = 'Spoilt-'.$station->name;
        $aspirant->ward_id = $station->ward_id;
        $aspirant->level = 'ALL';
        $aspirant->save();

        $aspirant->station()->syncWithoutDetaching([$station->id]);
        //all done ;-)

        if (\Request::ajax()) {
            return response()->json($station);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        $wards = \App\Ward::orderBy('name')->pluck('name','id');
        $station->load('aspirant','result','ward');

        if (\Request::ajax()) {
            return view('stations.show')->withStation($station)->withWard($wards);
        }
        return view('master.stations.show')->withStation($station)->withWard($wards);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        $this->validate($request, [
            'name'      => 'sometimes|required|unique:stations,name,'.$station->id,
            'ward_id'   => 'sometimes|required',
            'expected_votes'   => 'nullable|numeric|min:0'
            ]);

        $station->update($request->all());
        $station->save();

        $station->load('ward');
        if (\Request::ajax()) {
            return response()->json($station);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return response()->json($station);
    }
}
