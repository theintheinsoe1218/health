<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Appointment;
use Illuminate\Support\Facades\DB;
use App\Medicine;
use App\Patient_medicine;


class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatment = DB::table('treatments')
                    ->join('appointments', 'appointments.id', '=', 'treatments.appointment_id')
                    ->join('users', 'users.id', '=', 'appointments.user_id')

                    ->select('treatments.*', 'users.name as uname')
                    ->get();
         //dd($treatment);
        return view('treatment.index',compact('treatment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $appointments = DB::table('appointments')
                    ->join('users', 'users.id', '=', 'appointments.user_id')
                    ->select('appointments.id','appointments.user_id', 'users.name as uname')
                    ->get();
                    //dd($appointments);
        $medicines = Medicine::all();
        return view('treatment.create',compact('appointments','medicines'));
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            "occur" => 'required',
            "allergic" => 'required',
            "date" => 'required'
            
        ]);*/
        // dd($request);
        if (request('occur')) {
            # code...
       
            $treatment = new Treatment;
            $treatment->occur = request('occur');
            $treatment->allergic = request('allergic');
            $treatment->date = request('date');
            $treatment->created_at = NOW();
            $treatment->updated_at = NOW();
            $treatment->appointment_id = request('user_id');
            $treatment->save();

             }

        $medicine_array = $request->medicine_amount;
        $user_id = $request->user_id;
        //dd($medicine_array);
        if($medicine_array !=null){


        foreach ($medicine_array as $key => $value) {
            //dd($key.$value);
            $patient_medicine = new Patient_medicine;
            $patient_medicine->appointment_id = request('user_id');
            $patient_medicine->medicine_id = $key;
            $patient_medicine->amount = $value;
            $patient_medicine->save();
        }

        }
        

        
        //dd($request);
        return redirect()->route('treatment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $patient_medicines = DB::table('patient_medicines')
            ->join('medicines', 'medicines.id', '=', 'patient_medicines.medicine_id')
            ->where('patient_medicines.appointment_id', '=', $id)
            ->select('patient_medicines.*', 'medicines.name as mname')
            ->get();
            //dd($patient_medicines);

        $treatment = DB::table('treatments')
                    ->join('appointments', 'appointments.id', '=', 'treatments.appointment_id')
                    ->join('users', 'users.id', '=', 'appointments.user_id')
                    ->where('treatments.appointment_id', '=', $id)
                    ->select('treatments.*', 'users.name as uname','appointments.*')
                    ->get();
                    //dd($treatment);
        return response()->json([
                    'patient_medicines' => $patient_medicines,
                    'treatment' => $treatment
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatment = Treatment::find($id);
        return view('treatment.edit',compact('treatment'));
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
        $request->validate([
            "cost" => 'required'
        ]);
        //dd($request);
        $tid= request('tid');

        $treatment = Treatment::find($tid);
        
        $treatment->cost = request('cost');
        
        $treatment->save();
        return redirect()->route('treatment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addMedicine()
    {
        $medicine_amount = request('medicine_amount');
        $medicine_amount = Medicine::where('add',$medicine_amount)->get();
        return MedicineResource::collection($medicine_amount);
    }
    
}
