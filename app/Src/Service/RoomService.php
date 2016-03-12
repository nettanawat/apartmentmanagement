<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 1:10 PM
 */

namespace App\Service;


interface RoomService {
    function findRoomByRoomType($slug);
} 