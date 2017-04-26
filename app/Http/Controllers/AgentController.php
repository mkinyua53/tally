<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('type') == 'create') {
            return view('agents.create');
        }
        if (\Request::ajax()) {
            return view('agents.index')->withAgent(Agent::all());
        }

        return view('master.agents.index')->withAgent(Agent::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'nullable|email|unique:agents',
            'phone' => 'required|numeric|unique:agents',
            ]);

        $agent = new Agent;
        $agent->fill($request->all());
        $agent->save();

        if ($request->hasFile('avatar')) {
            return redirect()->action('AgentController@avatar',['agent'=>$agent]);
        }

        if (\Request::ajax()) {
            return response()->json($agent);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {   
        if (\Request::ajax()) {
             return view('agents.show')->withAgent($agent);
         }
         return view('master.agents.show')->withAgent($agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $this->validate($request, [
            'name'  => 'sometimes|required',
            'email' => 'sometimes|nullable|email|unique:agents,email,'.$agent->id,
            'phone' => 'required|unique:agents,phone,'.$agent->id,
            ]);

        $agent->update($request->all());
        $agent->save();

        if (\Request::ajax()) {
            return response()->json($agent);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();

        return response()->json($agent);
    }

    public function avatar(Request $request, $id)
    {
        $this->validate($request, [
            'avatar'    => 'required|image|max:2048',
            ]);

        $avatar = $request->avatar;
        $pathname = str_slug(\Carbon\Carbon::now()).'.'.$avatar->getClientOriginalExtension();

        $agent = Agent::findOrFail($id);
        $agent->avatar = 'avatars/'.$pathname;
        $agent->save();
        
        \Image::make($avatar)->save(public_path('avatars/'.$pathname));

        if (\Request::ajax()) {
            return response()->json($agent);
        }
        return back();
    }
}
