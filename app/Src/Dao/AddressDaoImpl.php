<?php
/**
 * Created by PhpStorm.
 * User: nettanwat
 * Date: 11/7/15 AD
 * Time: 11:48 AM
 */

namespace App\Src\Dao;

use App\Src\Models\Address;
use Illuminate\Http\Request;

class AddressDaoImpl implements AddressDao {

    function addAddress(Request $request, $customerId)
    {
        $address = new Address();
        $address->address_line1 = $request->get('address_line1');
        $address->address_line2 = $request->get('address_line2');
        $address->city = $request->get('city');
        $address->province = $request->get('province');
        $address->post_code = $request->get('post_code');
        $address->customer_id = $customerId;
        $address->save();
        return $customerId;
    }

    function findAddressByCustomerId($id)
    {
        return Address::findOrNew($id);
    }

    function updateAddress(Request $request, $customerId)
    {
        $address = Address::where('customer_id', '=', $customerId);

        $newAddress = array(
            'address_line1' => $request->get('address_line1'),
            'address_line2' => $request->get('address_line2'),
            'city' => $request->get('city'),
            'province' => $request->get('province'),
            'post_code' => $request->get('post_code'),
        );
        $address->update($newAddress);
        return $customerId;
    }
}