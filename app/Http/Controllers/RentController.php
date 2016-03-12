<?php

namespace App\Http\Controllers;

use App\Src\Models\Rent;
use App\Src\Models\Room;
use App\Service\RoomServiceImpl;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rent.rentList', [Rent::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $roomController = new RoomController();
        $room = $roomController->findBySlug($slug);

        if($room == null){
            return back()->withErrors(['error' => 'Invalid room in database. Please select again.']);
        } else {
            if($room->is_available == false){
                return back()->withErrors(['error' => 'Room number '.$room->name.' is not available. Please select the available room']);
            } else {
                return view('rent.checkin', ['room' => $room]);
            }
        }
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
            'first_name' => 'required|between:3,50',
            'last_name' => 'required|between:3,50',
            'citizen_id' => 'required|unique:customers|digits:13',
            'date_of_birth' => 'required',
            'telephone_number' => 'digits:9',
            'phone_number' => 'required|digits:10',
            'email' => 'required|email|between:4,50',
            'address_line1' => 'required|max:100',
            'address_line2' => 'max:100',
            'city' => 'required|max:45',
            'province' => 'required|max:45',
            'post_code' => 'required|digits:5',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        //add new customer
        $customerController = new CustomerController();
        $customerId = $customerController->store($request, true);

        //update room status
        $roomController = new RoomController();
        $roomController->updateRoomStatus(true, $request->get('room_id'));

        $rent = new Rent();
        $rent->check_in = date('Y-m-d H:i:s');
        $rent->customer_id = $customerId;
        $rent->room_id = $request->get('room_id');
//        $rent->created_at->timezone('Asia/Bangkok');
        $rent->save();
        return redirect('rental');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selectRoom($roomTypeSlug = null){
        $floorController = new FloorController();
        $floors = $floorController->allFloor();
        $roomTypeController = new RoomTypeController();
        $roomTypes = $roomTypeController->allRoomType();
        if($roomTypeSlug == 'all'){
            $roomController = new RoomController();
            $rooms = $roomController->allRoom();
        } else {
            $roomServiceImpl = new RoomServiceImpl();
            $rooms = $roomServiceImpl->findRoomByRoomType($roomTypeSlug);
        }
        return view('rent.roomListRent', ['rooms' => $rooms, 'floors' => $floors, 'roomTypes' => $roomTypes]);
    }
}
