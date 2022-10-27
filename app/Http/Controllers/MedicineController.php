<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine=Medicine::all();
        return view('medicine.index',compact('medicine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //validation
        $request->validate([
            "name"=>'required',
            "qty"=>'required',
            "price"=>'required'
        ]);
        //data insert
        $medicine=new Medicine;
        $medicine->name=request('name');
        $medicine->qty=request('qty');
        $medicine->price=request('price');
        $medicine->save();
         return redirect()->route('medicine.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine=Medicine::find($id);
        return view('medicine.edit',compact('medicine'));
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
        //validation
        $request->validate([
            "name"=>'required',
            "qty"=>'required',
            "price"=>'required'
        ]);
        //data insert
        $medicine=Medicine::find($id);
        $medicine->name=request('name');
        $medicine->qty=request('qty');
        $medicine->price=request('price');
        $medicine->save();
         return redirect()->route('medicine.index',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $medicine=Medicine::find($id);
        $medicine->delete();

        return redirect()->route('medicine.index');
    }

    public function getMedicines(Request $request)
    {
        $appointment_id = $request->appointment_id;
        $medicines = DB::table('patient_medicines')
            ->join('medicines', 'medicines.id', '=', 'patient_medicines.medicine_id')
            ->where('patient_medicines.appointment_id','=',$appointment_id)
            ->select('patient_medicines.*', 'medicines.name as medicine_name', 'medicines.id as medicine_id')
            ->get();
            //dd($medicines);
        return $medicines;
        
    }
    public function updateMedicines(Request $request)
    {
        $medicine_array = $request->medicine_amount;
        $appointment_id = $request->appointment_id;
        //dd($appointment_id);



        //dd($medicine_array);
        if($medicine_array !=null){


        foreach ($medicine_array as $key => $value) {
            //dd($key.$value);
               
            $affected = DB::table('patient_medicines')
              ->where('appointment_id', $appointment_id)
              ->where('medicine_id', $key)
              ->update(['amount' => $value]);
        }

        }
        return "Update";
        
    }
}
