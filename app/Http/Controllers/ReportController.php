<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Medicine;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getReport(Request $request)
    {
        
       /* dd($request);*/
        $from = $request->from;
        $to = $request->to;
        //dd($from);

        $treatments = DB::table('treatments')->where([
            ['date', '>=', $from],
            ['date', '<=', $to],
        ])->get();
        //dd($treatments);

       $size = count($treatments);
       //dd($size);

        if ($size == 0) {
           $treatments = "Empty Result";
           //dd($treatments);
        }
        return $treatments;
    }

    public function getReports(){
        /* $treatment = Treatment::all();*/

         $treatment = DB::table('treatments')
            ->join('appointments', 'appointments.id', '=', 'treatments.appointment_id')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->select('treatments.*', 'appointments.*', 'users.name as uname')
            ->get();
         //dd(sizeof($treatment));
        $cost = 0;
        for($i=0;$i<sizeof($treatment);$i++){
            $cost += $treatment[$i]->cost;
        }
        //dd($cost);

        $medicine = Medicine::all();
        $outcome = 0;
        for($i=0;$i<sizeof($medicine);$i++){
            $outcome += ($medicine[$i]->qty * $medicine[$i]->price);
        }

        $profits = ($cost - $outcome);
        return view('report.report',compact('treatment','cost','outcome','profits'));
    }
}
