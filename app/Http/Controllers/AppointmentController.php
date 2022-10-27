<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $appointment = Appointment::find($id);
        // return view('treatment.creat',compact('appointment'));
        $date=date("Y-m-d");
        $appointment=Appointment::where('appointment_date',$date)->get();
        
        // dd($treatment);
        return view('appointment.index',compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('appointment.appoint');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        // $request->validate([
        //     "age"=>'required',
        //     "gender"=>'required',
        //     "symtons"=>'required',
        //     "date"=>'required'
        // ]);
       //dd($request);

        // $appointment=new Appointment;
        // $appointment->age=request('age');
        // $appointment->gender=request('gender');
        // $appointment->symtoms=request('symtons');
        // $appointment->appointment_date=request('date');

        // $appointment->user_id=Auth::id();
        // $appointment->token_no=1;

        // $appointment->save();


        // //Redirect
        // return redirect()->route('home');

//*************************************************************************

        //Validate

        //Get Last token number of appoint date
       // $token_no = $this->getTokenNo($request->date);

        //Store
        $appointment=new Appointment;
        $appointment->age=request('age');
        $appointment->gender=request('gender');
        $appointment->symptoms=request('symptoms');
        $appointment->appointment_date=request('date');

        $appointment->user_id=Auth::id();
        //dd($request);
        $appointment->token_no= request('tokenno');

        $appointment->save();

        //$current_token = $token_no + 1;


        //return with token number
      return redirect()->route('getAppointmentview')->with('success','Successfully! make an appointment');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('appointment.appoint');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //dd($request);
        /*$request->validate([
            "user_id" => 'required',
            "age" => 'required',
            "symtoms" => 'required',
            "appointment_date" => 'required',
            "token_no" => 'required'
        ]);*/

        $appointment = Appointment::find($id);
        //dd($appointment);
        $appointment->user_id = request('user_id');
        
        $appointment->status = 1;
        $appointment->save();

        if (request('status') == 2) {
           $appointment = Appointment::find($id);
        //dd($appointment);
        $appointment->user_id = request('user_id');
        
        $appointment->status = 2;
        $appointment->save();

        }

        return redirect()->route('appointment.index');
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
    
    public function getTokenNo(Request $request)
    {
        $date=request('date');
        $appointment=Appointment::where('appointment_date',$date)->get();
        $token_no = $appointment->count();
        $current_token = $token_no + 1;
        //dd($token_no);

        return $current_token;
    }

    public function getAppointment(Request $request){
        //dd('request');

       // dd($request->token_change);
        
        $user_id=Auth::id();
        $current_date = date('Y-m-d');
       //dd($current_date);
        //dd($user_id);
       $appointment_users = Appointment::where('user_id',$user_id)->get();
      

       foreach ($appointment_users as $appointment_user) {
            $user_date = $appointment_user->appointment_date;
            //dd($user_date);
           if ($current_date == $user_date) {
          //dd('hi');
              $appointments = DB::table('appointments')
                ->where('appointment_date', '=', $current_date)
                ->join('users','users.id','=','appointments.user_id')
                ->get();
               // dd($appointments);

       return $appointments;
               
        } else if($current_date < $user_date){
             $appointments = DB::table('appointments')
                ->where('appointment_date', '=', $user_date)
                ->join('users','users.id','=','appointments.user_id')
                ->get();
               // dd($appointments);
 
        return $appointments;
        } 
       }
       //dd($user_date);
        
    }
    public function getAppointmentview(Request $request)
    {


        return view('token.detail');
    }
    
}
