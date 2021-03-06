<?php

namespace App\Http\Controllers;

use App\Src\Dao\RoomTypeDaoImpl;
use App\Src\Models\RoomType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roomTypes = RoomType::all();
        return view('roomtype.roomTypeList', ['roomTypes' => $roomTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.addRoomType');
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
            'name' => 'required|unique:room_types|between:2,20',
            'daily_price' => 'numeric',
            'monthly_price' => 'numeric'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $roomTypeDaoImpl = new RoomTypeDaoImpl();
        $roomTypeDaoImpl->addRoomType($request);

        Session::flash('flash_message', 'Task successfully added!');
        return redirect('roomtype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $roomTypeDaoImpl = new RoomTypeDaoImpl();
        $roomType = $roomTypeDaoImpl->findRoomTypeBySlug($slug);
        return view('roomtype.addRoomType', ['roomType' => $roomType]);
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
            'name' => 'required|unique:room_types|between:2,20',
            'daily_price' => 'numeric',
            'monthly_price' => 'numeric'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $roomTypeDaoImpl = new RoomTypeDaoImpl();
        $roomTypeDaoImpl->editRoomType($request, $id);
        Session::flash('flash_message', 'Task successfully added!');
        return redirect('roomtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomTypeDaoImpl = new RoomTypeDaoImpl();
        $roomType = $roomTypeDaoImpl->deleteRoomType($id);
        Session::flash('flash_message', 'Task successfully delete!');
        return redirect()->back();
    }

    public function allRoomType(){
        $roomTypes = RoomType::all();
        return $roomTypes;
    }
}
