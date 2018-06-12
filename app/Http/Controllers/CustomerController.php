<?php

namespace App\Http\Controllers;

use App\Customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class CustomerController extends Controller
{


    public function index()
    {
        return view('layouts.customer.create');
    }

    public function saveCustomer(Request $request)
    {

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $birthday = $request->input('birthday');
        $gender = $request->input('gender');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $company_name = $request->input('company_name');

        $customer = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthday' => $birthday,
            'gender' => $gender,
            'phone_number' => $phone_number,
            'email' => $email,
            'company_name' => $company_name
        );

        Customer::saveCustomer($customer);
        return redirect()->back()->with('alert', 'Customer successfully created!');
    }

    public function customerList()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('layouts.customer.list', compact('customers'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search != null) {
            $customers = Customer::where('first_name', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->paginate(10);

            if (count($customers) > 0) {
                return view('layouts.customer.list', compact('customers'));
            } else {
                return view('layouts.customer.list')->withMessage(" No Results Found !");
            }
        }
        return redirect()->to('/customer/');
    }

    public function updateCustomer(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $birthday = $request->input('birthday');
        $gender = $request->input('gender');
        $phone_number = $request->input('telephone');
        $email = $request->input('email');
        $company_name = $request->input('company_name');
        $id = $request->input('id');

        $customer = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthday' => $birthday,
            'gender' => $gender,
            'phone_number' => $phone_number,
            'email' => $email,
            'company_name' => $company_name,
            'id' => $id
        );

        Customer::updateCustomer($customer);
        return redirect()->back()->with('alert', 'Customer successfully updated!');
    }

    public static function downloadPDF($id)
    {
        $customer = Customer::find($id);

        $pdf = PDF::loadView('layouts.customer.pdf',compact('customer'));
        return $pdf->download('customer.pdf');
    }

    public static function downloadCustomerList()
    {
        $customers = Customer::all();

        $pdf = PDF::loadView('layouts.customer.pdfc',compact('customers'));
        return $pdf->download('customer.pdf');
    }

}
