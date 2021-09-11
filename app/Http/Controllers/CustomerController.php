<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function index()
    {
        $customers = Customer::with('department')->get()->toArray();
        return array_reverse($customers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gsm_no' => 'required',
            'department_id' => 'required',
            'birthday' => 'required',
            'captcha' => 'required|captcha_api:'. request('key') . ',math',
        ]);

        $customer = new Customer([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gsm_no' => $request->input('gsm_no'),
            'department_id' => $request->input('department_id'),
            'birthday' => $request->input('birthday')
        ]);
        $customer->save();

        return response()->json(['success'=>'Done!']);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());

        return response()->json('Customer updated!');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json('Customer deleted!');
    }
}
