<?php

namespace App\Http\Controllers;

use App\Src\Dao\RoomDaoImpl;
use App\Src\Models\Room;
use App\Service\RoomServiceImpl;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room.roomList', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomTypeController = new RoomTypeController();
        $roomTypes = $roomTypeController->allRoomType();
        $floorController = new FloorController();
        $floors = $floorController->allFloor();
        return view('room.addroom', ['roomTypes' => $roomTypes, 'floors'=> $floors]);
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
            'name' => 'required|unique:rooms|between:2,20',
            'max_customer' => 'required|between:1,100|integer',
            'roomType' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $roomDaoImpl = new RoomDaoImpl();
        $roomDaoImpl->addRoom($request);
        Session::flash('flash_message', 'Task successfully added!');
        return redirect('room');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
        $room = Room::whereSlug($slug)->first();
        $roomTypeController = new RoomTypeController();
        $roomTypes =$roomTypeController->allRoomType();

        $floorController = new FloorController();
        $floors = $floorController->allFloor();

        return view('room.addroom', ['room' => $room, 'roomTypes' => $roomTypes, 'floors'=> $floors]);
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
            'name' => 'required|between:2,20',
            'max_customer' => 'required|between:1,100|integer',
            'roomType' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $roomDaoImpl = new RoomDaoImpl();
        $roomDaoImpl->editRoom($request, $id);

        Session::flash('flash_message', 'Task successfully added!');
        return redirect('room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomDaoImpl = new RoomDaoImpl();
        $room = $roomDaoImpl->deleteRoom($id);
        Session::flash('flash_message', 'Task successfully delete!');
        return redirect()->back();
    }

    public function allRoom()
    {
        $roomDaoImpl = new RoomDaoImpl();
        return $roomDaoImpl->findAllRoom();
    }

    public function findBySlug($slug){
        $roomDaoImpl = new RoomDaoImpl();
        $room = $roomDaoImpl->findRoomBySlug($slug);
        return $room;
    }

    public function updateRoomStatus($isCheckIn = true, $id){
        $room = Room::findOrNew($id);
        if($isCheckIn){
            $room->is_available = false;
            $room->save();

        } else {
            $room->is_available = true;
            $room->save();
        }
    }
}
