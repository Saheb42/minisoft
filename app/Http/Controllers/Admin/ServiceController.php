<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //
    public function service_create(Request $request)
    {
        DB::table('services')->insert([
            's_name' =>  $request->ser_name,
            's_price'=>  $request->ser_price,
            's_expenses'=> $request->ser_expenses,
            's_com1' =>   $request->ser_com1,
            's_com2' =>  $request->ser_com2,
            's_com3' =>  $request->ser_com3,
        ]);
        return back();
    }

    public function service_edit($id)
    {
        $data = DB::table('services')
        ->where('id','=',$id)
        ->get();
        // dd($data);
        return view('Admin.Pages.Services.services_edit',compact('data'));
        # code...
    }

    public function service_delete($id)
    {
        DB::table('services')
        ->where('id',$id)
        ->delete();

        return back();
        # code...
    }
    public function service_update(Request $request)
    {
        // dd($request);
        DB::table('services')
        ->where('id',$request->update_id)
        ->update([
        "s_name" => $request->update_ser_name,
        "s_price" => $request->update_ser_price,
        "s_expenses" => $request->update_ser_expenses,
        "s_com1" => $request->update_ser_com1,
        "s_com2" => $request->update_ser_com2,
        "s_com3" => $request->update_ser_com3
        ]);
        return redirect()->route('admin.service_view');
        # code...
    }

}
