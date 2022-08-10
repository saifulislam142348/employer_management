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
use App\Models\month;
use Auth;
class LeavesController extends Controller
{
   public function leave(){
      $user = User::where('type','employee')->get();
      $month = month::get();
    return view('admin.pages.include.leave',compact('user','month'));
   }

   public function leavestore(Request $request){
      $rules=[
         'user_id' => ['required'], 
         'month_id' => ['required'], 
         'leave' => ['required'], 
        
 
     ];
     $this->validate($request,$rules);
 
      $leave= new Leave();
      $leave->user_id=$request->input('user_id');
      $leave->month_id=$request->input('month_id');
      $leave->leave=$request->input('leave');
      $leave->create_by= Auth::User()->name;
     $leave->save();
     return redirect()->back()->with('status',' success');
   }
}
