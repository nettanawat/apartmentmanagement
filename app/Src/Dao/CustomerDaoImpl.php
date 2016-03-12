<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 10:45 AM
 */

namespace App\Src\Dao;


use Illuminate\Http\Request;
use App\Src\Dao\CustomerDao;
use App\Src\Models\Customer;

class CustomerDaoImpl implements CustomerDao {

    function addCustomer(Request $request)
    {
        $customer = new Customer();
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->citizen_id = $request->get('citizen_id');
        $customer->date_of_birth = $request->get('date_of_birth');
        $customer->telephone_number = $request->get('telephone_number');
        $customer->phone_number = $request->get('phone_number');
        $customer->email = $request->get('email');
        //slug
        $slug = str_slug($request->get('first_name').' '.$request->get('last_name'), '-');
        $customer->slug = $slug;
        $customer->save();
        return $customer->id;
    }

    function editCustomer(Request $request, $id)
    {
        $customer = Customer::findOrNew($id);
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->citizen_id = $request->get('citizen_id');
        $customer->date_of_birth = $request->get('date_of_birth');
        $customer->telephone_number = $request->get('telephone_number');
        $customer->phone_number = $request->get('phone_number');
        $customer->email = $request->get('email');
        $customer->slug = str_slug($request->get('first_name').' '.$request->get('last_name'), '-');
        $customer->save();
        return $customer->id;
    }

    function deleteCustomer($id)
    {
        return Customer::destroy($id);
    }

    function findById($id)
    {
        return Customer::findOrNew($id);
    }

    function findBySlug($slug)
    {
        return Customer::whereSlug($slug)->first();
    }

    function findAllCustomer()
    {
        return Customer::all();
    }
}