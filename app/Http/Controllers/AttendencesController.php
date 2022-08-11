<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendence;
use App\Models\Bonus;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Salary;
use App\Models\Month;
use Auth;
use Carbon\Carbon;

class AttendencesController extends Controller
{
   public function attendence(){
      $attendence= Attendence::latest()->get();
      $in= Attendence::select('in_time')->latest()->get();
      $out= Attendence::select('out_time')->latest()->get();
      $user= User::where('type','employee')->get();
      $month= Month::get();

    return view('admin.pages.include.attendence',compact('user','month','attendence','in','out'));
   }

   public function inTime(Request $request){
      $rules=[
         'user_id' => ['required'], 
         'month_id' => ['required'], 
 
     ];
     $this->validate($request,$rules);
     $todayDate = Carbon::now()->format('Y-m-d H:i:s');
      $present= new Attendence();
      $present->user_id=$request->input('user_id');
      $present->month_id=$request->input('month_id');
      $present->in_time =  $todayDate;
      $present->create_by= Auth::User()->name;
     $present->save();
     return redirect()->back()->with('status',' success');
   }

public function outTime(Request $request){
    $rules=[
    'user_id' => ['required'], 
    'month_id' => ['required'], 
];
 $this->validate($request,$rules);
 $todayDate = Carbon::now()->format('Y-m-d H:i:s');
  $present= new Attendence();
  $present->user_id=$request->input('user_id');
  $present->month_id=$request->input('month_id');
  $present->out_time =  $todayDate;
  $present->status = 1;
  $present->create_by= Auth::User()->name;
 $present->save();
 return redirect()->back()->with('status',' success');
}

}
