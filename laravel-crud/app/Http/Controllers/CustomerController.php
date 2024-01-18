<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }

    public function create(){
        return view('customer.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email_address' => 'required'
        ]);
        $newCustomer = Customer::create($data);
        return redirect(route('customer.index'))->with('success', 'Customer Added Successfully');
    }

    public function edit(Customer $customer){
        return view('customer.edit', ['customer' => $customer]);
    }

    public function update(Customer $customer, Request $request){
        $data = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email_address' => 'required'
        ]);
        $customer->update($data);
        return redirect(route('customer.index'))->with('success', 'Customer Update Successfully');
    }

    public function delete(Customer $customer){
        $customer->delete();
        return redirect(route('customer.index'))->with('success', 'Customer Deleted Successfully');
    }
}
