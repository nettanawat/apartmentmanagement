<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 10:45 AM
 */

namespace App\Src\Dao;


use Illuminate\Http\Request;

interface CustomerDao {
    function addCustomer(Request $request);
    function editCustomer(Request $request, $id);
    function deleteCustomer($id);
    function findById($id);
    function findBySlug($slug);
    function findAllCustomer();
} 