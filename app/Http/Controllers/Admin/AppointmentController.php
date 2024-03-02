<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $ldate = date('Y-m-d');
        $appointments = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->orderBy('id', 'DESC')->paginate(10);
        $appointments_today = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'accept')
                            ->where('date',$ldate)
                            ->orderBy('id', 'DESC')->paginate(10);
        // $previous_appointments = Appointment::with('categories')
        //             ->with('user_appointment')
        //             ->with('workdays')
        //             ->where("status" ,'expired')
        //             ->orderBy('id', 'DESC')->get();
        // dd($appointments);
        return view('admin.appointments.all',compact('appointments','appointments_today'));
    }
    public function previous()
    {
        $appointments = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'expired')
                            ->orderBy('id', 'DESC')->paginate(10);
        // $previous_appointments = Appointment::with('categories')
        //             ->with('user_appointment')
        //             ->with('workdays')
        //             ->where("status" ,'expired')
        //             ->orderBy('id', 'DESC')->get();

        // dd($appointments);

        return view('admin.appointments.previous',compact('appointments'));
    }
    public function updateStatus(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->status = $request->status;
        $appointment->save();
        return back()->with("message", 'تم تغيير الحالة ');
    }
    public function create()
    {
        return view('admin.cities.create');
    }




}
