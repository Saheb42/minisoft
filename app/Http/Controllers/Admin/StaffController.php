<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    public function staffs_create(Request $request)
    {
        // dd($request);
        DB::table('staffs')->insert([
            'aadhaar_card' => $request->addhar_card,
            'staff_id' => $request->staff_id,
            'name' => $request->user_name,
            'address' => $request->user_add,
            'pincode' => $request->user_pin,
            'photo' => $request->user_photo,
            'phone_no' => $request->user_phn_num,
            'docs' => $request->user_docs,
            'email' => $request->user_email_add,
            'password' => bcrypt($request->user_pass),
            'pass_txt' => $request->user_pass,
        ]);
        Alert::toast('Staff Inserted Successfuly.','success');
        return back();
    }
}
