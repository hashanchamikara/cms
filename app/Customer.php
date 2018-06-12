<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{

    public static function saveCustomer($data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user()->getAuthIdentifier();
            $customer = new Customer();
            $customer->first_name = $data['first_name'];
            $customer->last_name = $data['last_name'];
            $customer->dob = $data['birthday'];
            $customer->gender = $data['gender'];
            $customer->phone = $data['phone_number'];
            $customer->email = $data['email'];
            $customer->company_name = $data['company_name'];
            $customer->user_created = $user;
            $customer->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public static function updateCustomer($data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user()->getAuthIdentifier();
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $birthday = $data['birthday'];
            $gender = $data['gender'];
            $phone_number = $data['phone_number'];
            $email = $data['email'];
            $company_name = $data['company_name'];
            $id = $data['id'];

            DB::table('customers')
                ->where('id', $id)
                ->update(['first_name' => $first_name, 'last_name' => $last_name, 'dob' => $birthday,
                    'gender' => $gender, 'phone' => $phone_number, 'email' => $email, 'company_name' => $company_name,
                    'updated_at' => date('Y-m-d H:i:s'), 'user_modified' => $user]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
