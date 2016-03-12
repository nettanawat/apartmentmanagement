<?php

namespace App\Http\Controllers;

use App\Src\Models\Floor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('floor.floorList', ['floors' => Floor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('floor.addFloor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:floors|max:10'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $floor = new Floor();
        $floor->name = $request->get('name');
        $floor->slug = str_slug($request->get('name'));
        $floor->save();
        Session::flash('flash_message', 'Task successfully added!');
        return redirect('floor');
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
    public function edit($slug)
    {
        $floor = Floor::whereSlug($slug)->first();
        return view('floor.addFloor', ['floor' => $floor]);
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
        // Validate
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:floors|max:10'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $floor = Floor::findOrNew($id);
        $floor->name = $request->get('name');
        $floor->slug = str_slug($request->get('name'));
        $floor->save();
        Session::flash('flash_message', 'Task successfully updated!');
        return redirect('floor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $floor = Floor::destroy($id);
        Session::flash('flash_message', 'Task successfully delete!');
        return redirect()->back();
    }

    public function allFloor(){
        return Floor::all();
    }
}
