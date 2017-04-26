<?php

namespace App\Http\Controllers;

use App\Aspirant;
use Illuminate\Http\Request;

class AspirantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wards = \App\Ward::orderBy('name')->pluck('name','id');
        
        if ($request->query('type') == 'create') {
            return view('aspirants.create')->withWard($wards);
        }

        $aspirants = Aspirant::with('ward')->get();
        if (\Request::ajax()) {
            return view('aspirants.index')->withAspirant($aspirants);
        }
        return view('master.aspirants.index')->withAspirant($aspirants)->withWard($wards);
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
            'name'      => 'required|unique:aspirants',
            'ward_id'   => 'required',
            'votes'     => 'nullable|numeric',
            'level'     => 'required',
            ]);

        $aspirant = new Aspirant;
        $aspirant->fill($request->all());
        $aspirant->save();

        $aspirant->load('ward');

        if ($request->has('avatar')) {
            return redirect()->action('AspirantController@avatar',['id'=>$aspirant->id, $request=>$request->avatar]);
        }

        return response()->json($aspirant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aspirant  $aspirant
     * @return \Illuminate\Http\Response
     */
    public function show(Aspirant $aspirant)
    {
        $aspirant->load('result');
        $wards = \App\Ward::orderBy('name')->pluck('name','id');

        if (\Request::ajax()) {
            return view('aspirants.show')->withAspirant($aspirant)->withWard($wards);
        }
        return view('master.aspirants.show')->withAspirant($aspirant)->withWard($wards);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aspirant  $aspirant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspirant $aspirant)
    {
        $this->validate($request, [
            'name'      => 'sometimes|required|unique:aspirants,name,'.$aspirant->id,
            'ward_id'   => 'sometimes|required',
            'votes'     => 'nullable|numeric',
            'level'     => 'sometimes|required',
            ]);

        $aspirant->update($request->all());
        $aspirant->save();

        $aspirant->load('ward');

        if (\Request::ajax()) {
            return response()->json($aspirant);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aspirant  $aspirant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspirant $aspirant)
    {
        $aspirant->delete();

        return response()->json($aspirant);
    }

    public function avatar(Request $request, $id)
    {
        $v = \Validator::make($request->all(), [
            'avatar'    => 'required|image|max:2048',
            ]);
        if ($v->fails()) {
            return response()->json($v);
        }

        $avatar = $request->avatar;
        $pathname = str_slug(\Carbon\Carbon::now()).'.'.$avatar->getClientOriginalExtension();

        $aspirant = Aspirant::findOrFail($id);
        $aspirant->avatar = 'avatars/'.$pathname;
        $aspirant->save();
        
        \Image::make($avatar)->save(public_path('avatars/'.$pathname));

        if (\Request::ajax()) {
            return response()->json($aspirant);
        }
        return back();
    }

    public function votes()
    {   
        $aspirants = Aspirant::get();

        foreach ($aspirants as $aspirant) {

            $aspirant->votes = \DB::table('results')->where('aspirant_id',$aspirant->id)->sum('votes');
            $aspirant->save();
        }

        return response()->json($aspirants);
    }
}
