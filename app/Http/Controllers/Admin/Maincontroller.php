<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Maincontroller extends Controller
{
    public function index()
    {
        # code...
        // Alert::toast('This is A Demo.','success');
        // alert()->success('This is A Demo.','success');
        return view('Admin.Pages.dashboard');
    }
    public function service_view()
    {
        # code...
        // Helper::get_count();
        $data = DB::table('services')->get();
        // dd($data);
        return view('Admin.Pages.Services.view', compact('data'));
    }
    public function service_chk_single_data(Request $request)
    {

        $req = $request->query();

        $data = Helper::get_count(
            $req['t_n'],
            $req['f_n'],
            $req['f_v']
        );


        return response()->json($data);
        # code...
    }

    public function staffs_view()
    {
        # code...
        $data = DB::table('staffs')->orderBy('id','desc')->first();
        $final = '';
        $prefix = '';
        $infix = '';
        $postfix = '';
        if($data == null){
            $serialString = '';
            $date2 = date('Ym');
            $num = str_pad(++$serialString, 4, '0', STR_PAD_LEFT);
            $final = ($prefix.$date2.$infix.$num.$postfix);
        }
        else{
            $dataget = $data->staff_id;
            $o_date = substr($dataget, 0, 6);
            $number2 = substr($dataget, -4);
            $o_year = substr($dataget, 0, 4);
            $o_month = substr($dataget, 4, 2);
            $n_date = date('Ym');
            $n_month = date('m');
            $number = ((date('m')-$o_month) == 0 ? str_pad(++$number2, 4, '0', STR_PAD_LEFT) : str_pad(1, 4, '0', STR_PAD_LEFT));
            $final = ($n_date.$number);
        }
        return view('Admin.Pages.Staffs.view',compact('final'));
    }


}
