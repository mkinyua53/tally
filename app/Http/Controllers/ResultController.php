<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = \App\Station::orderBy('name')->pluck('name','id');
        $aspirant = \App\Aspirant::orderBy('name')->pluck('name','id');
        $agents = \App\Agent::orderBy('name')->pluck('name','id');

        if (\Request::query('type') == 'create') {
            return view('results.create')->withStation($stations)->withAspirant($aspirant)->withAgent($agents);
        }

        $result = Result::with('aspirant','station','agent')->orderBy('created_at')->get();
        
        if (\Request::ajax()) {
            return view('results.index')->withResult($result);
        }
        return view('master.results.index')
            ->withAspirant($aspirant)
            ->withResult($result)
            ->withStation($stations)
            ->withAgent($agents);
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
            'station_id'    => 'required',
            'agent_id'         => 'required',
            'aspirant_id'   => 'required',
            'votes'         => 'required|numeric|min:0',
            ]);

        $result = new Result;
        $result->fill($request->all());
        $result->save();

        //Attach the aspirant to the station
        $station = $result->station;
        $aspirant = $result->aspirant;

        // Attach the aspirant to this station
        $station->aspirant()->syncWithoutDetaching([$aspirant->id]);

        //update the aspirant votes
        $aspirant->votes += $result->votes;
        $aspirant->save();

        //update the station's total votes
        $station->total_votes += $result->votes;
        $station->save();

        //check if they are spoilt votes and update accordingly
        if (str_contains($aspirant->name, 'Spoilt')) {
            $station->spoilt += $result->votes;
            $station->save();
        }

        $station->valid = $station->total_votes - $station->spoilt;
        $station->save();

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {   
        $result->load('aspirant','station','agent');

        if (\Request::ajax()) {
            return response()->json($result);
        }
        return view('master.results.show')->withResult($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $this->validate($request, [
            'station_id'    => 'sometimes|required',
            'agent_id'      => 'sometimes|required',
            'aspirant_id'   => 'sometimes|required',
            'votes'         => 'required|numeric|min:0',
            ]);

        

        $station = $result->station;
        $aspirant = $result->aspirant;

        //  UNDO THE DAMAGE
        //check if they are spoilt votes and update accordingly
        if (str_contains($aspirant->name, 'Spoilt')) {
            $station->spoilt -= $result->votes;
            $station->save();
        }
        else{
            //update the station's valid votes
            $station->valid -= $result->votes;
            $station->save();
        }
    
        $station->total_votes = $station->valid + $station->spoilt;
        $station->save();
        
        //update the aspirant votes
        $aspirant->votes -= $result->votes;
        $aspirant->save();
        // DAMAGE UNDONE

        // Do the actual update now
        $result->update($request->all());
        $result->save();

        // Update all again
        $aspirant->votes += $result->votes;
        $aspirant->save();

        //update the station's total votes
        $station->total_votes += $result->votes;
        $station->save();

        //check if they are spoilt votes and update accordingly
        if (str_contains($aspirant->name, 'Spoilt')) {
            $station->spoilt += $result->votes;
            $station->save();
        }
        else{
            $station->valid += $result->votes;
            $station->save();   
        }
        $station->total_votes = $station->valid + $station->spoilt;
        // Update done

        $result->load('aspirant','station','agent');

        if (\Request::ajax()) {
            return response()->json($result);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();
        
        return response()->json($result);
    }
}
