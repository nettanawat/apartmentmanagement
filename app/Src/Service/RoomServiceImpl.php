<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 1:10 PM
 */

namespace App\Service;


use App\Dao\RoomDaoImpl;

class RoomServiceImpl implements RoomService {

    function findRoomByRoomType($slug)
    {
        $roomDaoImpl = new RoomDaoImpl();
        $rooms = $roomDaoImpl->findAllRoom();
        $i = 0;
        foreach($rooms as $room){
            if($room->roomType->slug != $slug){
                unset($rooms[$i]);
            }
            $i++;
        }
        return $rooms;
    }
}