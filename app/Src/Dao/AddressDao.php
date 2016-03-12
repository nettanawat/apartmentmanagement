<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 11:47 AM
 */

namespace App\Src\Dao;
use Illuminate\Http\Request;

interface AddressDao {
    function addAddress(Request $request, $customerId);
    function findAddressByCustomerId($id);
    function updateAddress(Request $request, $customerId);
} 