<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 12:30 PM
 */

namespace App\Src\Dao;


use Illuminate\Http\Request;

interface RoomDao {
    function addRoom(Request $request);
    function editRoom(Request $request, $id);
    function deleteRoom($id);
    function findAllRoom();
    function findRoomById($id);
    function findRoomBySlug($slug);
}