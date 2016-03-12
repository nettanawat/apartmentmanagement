<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 12:53 PM
 */

namespace App\Src\Dao;
use App\Src\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeDaoImpl implements RoomTypeDao {

    function addRoomType(Request $request)
    {
        $roomType = new RoomType();
        $roomType->name = $request->get('name');
        $roomType->daily_price = $request->get('daily_price');
        $roomType->monthly_price = $request->get('monthly_price');
        $roomType->slug = str_slug($request->get('name'));
        $roomType->save();
        return $roomType->id;
    }

    function editRoomType(Request $request, $id)
    {
        $roomType = RoomType::findOrNew($id);
        $roomType->name = $request->get('name');
        $roomType->daily_price = $request->get('daily_price');
        $roomType->monthly_price = $request->get('monthly_price');
        $roomType->slug = str_slug($request->get('name'));
        $roomType->save();
    }

    function deleteRoomType($id)
    {
        return RoomType::destroy($id);
    }

    function findAllRoomType()
    {
        return RoomType::all();
    }

    function findRoomTypeById($id)
    {
        return RoomType::findOrNew($id);
    }

    function findRoomTypeBySlug($slug)
    {
        return RoomType::whereSlug($slug)->first();
    }
}