<?php

namespace App\Http\Controllers;

use App\Src\Dao\CustomerDaoImpl;
use App\Src\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = true;
        $customerDaoImpl = new CustomerDaoImpl();
        $customers = $customerDaoImpl->findAllCustomer();
//        return view('customer.customerList', ['customers' => $customers]);
        if(sizeof($customers) == 0 ) {
            $status = false;
        }
        return response()->json(
            [
                'response_status' => $status,
                'response_rows' => sizeof($customers),
                'response_data' => $customers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.addCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $isFromOtherController = false)
    {
        // Validate
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|between:3,50',
            'last_name' => 'required|between:3,50',
            'citizen_id' => 'required|unique:customers|digits:13',
            'date_of_birth' => 'required',
            'telephone_number' => 'between:8,15',
            'phone_number' => 'required|between:8,15',
            'email' => 'required|email|between:4,50',
            'address_line1' => 'required|max:100',
            'address_line2' => 'max:100',
            'city' => 'required|max:45',
            'province' => 'required|max:45',
            'post_code' => 'required|digits:5',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $customerDaoImpl = new CustomerDaoImpl();
        $customer = $customerDaoImpl->addCustomer($request);

        $addressController = new AddressController();
        $addressController->store($request, $customer);

        if($isFromOtherController){
            return $customer->id;
        } else{
            Session::flash('flash_message', 'Task successfully added!');
            return redirect('customer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $customerDaoImpl = new CustomerDaoImpl();
        $customer = $customerDaoImpl->findBySlug($slug);
        if($customer==null){
            return redirect('/error/pagenotfound');
        }
        return view('customer.profile', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $customerDaoImpl = new CustomerDaoImpl();
        $customer = $customerDaoImpl->findBySlug($slug);
        return view('customer.addCustomer', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|between:3,50',
            'last_name' => 'required|between:3,50',
            'citizen_id' => 'required|digits:13',
            'date_of_birth' => 'required',
            'telephone_number' => 'digits:9',
            'phone_number' => 'required|digits:10',
            'email' => 'required|email|between:4,50',
            'address_line1' => 'required|max:100',
            'address_line2' => 'max:100',
            'city' => 'required|max:45',
            'province' => 'required|max:45',
            'post_code' => 'required|digits:5',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $customerDaoImpl = new CustomerDaoImpl();
        $customerId = $customerDaoImpl->editCustomer($request, $id);
        $addressController = new AddressController();
//        dd($customerId);
        $addressController->update($request, $customerId);

        Session::flash('flash_message', 'Task successfully updated!');
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerDaoImpl = new CustomerDaoImpl();
        $customerDaoImpl->deleteCustomer($id);
        Session::flash('flash_message', 'Task successfully delete!');
        return redirect()->back();
    }

}
