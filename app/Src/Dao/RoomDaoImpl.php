<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 12:30 PM
 */

namespace App\Src\Dao;

use App\Src\Models\Room;
use Illuminate\Http\Request;

class RoomDaoImpl implements RoomDao {

    function addRoom(Request $request)
    {
        $room = new Room();
        $room->name = $request->get('name');
        $room->room_type_id = $request->get('roomType');
        $room->max_customer = $request->get('max_customer');
        $room->is_available = true;
        $room->description = $request->get('description');
        $room->floor_id = $request->get('floor');
        $room->slug = str_slug($request->get('name'));
        $room->save();
        return $room->id;
    }

    function editRoom(Request $request, $id)
    {
        $room = Room::findOrNew($id);
        $room->name = $request->get('name');
        $room->room_type_id = $request->get('roomType');
        $room->max_customer = $request->get('max_customer');
        $room->is_available = true;
        $room->description = $request->get('description');
        $room->slug = str_slug($request->get('name'));
        $room->floor_id = $request->get('floor');
        $room->save();
        return $id;
    }

    function deleteRoom($id)
    {
        return Room::destroy($id);
    }

    function findAllRoom()
    {
        return Room::all();
    }

    function findRoomById($id)
    {
        return Room::findOrNew($id);
    }

    function findRoomBySlug($slug)
    {
        return Room::whereSlug($slug)->first();
    }
}