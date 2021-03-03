<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createRequest;
use App\Customer;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }
    public function verify(createRequest $request)
    {
        $customer = new Customer;
        $customer->full_name= $request->full_name;
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->country = $request->country;
        $customer->company_name = $request->companyName;
        $customer->city = $request->city;
        $customer->phone = $request->phone;
        $customer->usertype= 'active';
        $customer->save();

        $request->session()->flash('successMsg','User Created Try Logging In!');
        return redirect()->route('login');
    }
}
