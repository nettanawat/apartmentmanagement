<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 12:53 PM
 */

namespace App\Src\Dao;

use Illuminate\Http\Request;

interface RoomTypeDao {
    function addRoomType(Request $request);
    function editRoomType(Request $request, $id);
    function deleteRoomType($id);
    function findAllRoomType();
    function findRoomTypeById($id);
    function findRoomTypeBySlug($slug);
}