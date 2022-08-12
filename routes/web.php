<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AttendencesController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\MonthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('user/index', [UserController::class, 'index'])->name('user.index');

Auth::routes();

// user panel 
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // route::get('user/index',[UserController::class,'index'])->name('user.index');

});

// admin panel
route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    //registratio9n controller
    route::get('admin/pages/include/registration', [RegistrationController::class, 'registration'])->name('admin.registration');
    route::post('admin/registration/create', [RegistrationController::class, 'store'])->name('admin.registration.store');
    route::get('statusChange/{id}', [RegistrationController::class, 'statusChange']);
    route::delete('registration/delete/{id}', [RegistrationController::class, 'delete']);

    //employee controller
    route::get('admin/pages/include/employee', [EmployeesController::class, 'employee'])->name('admin.employee');
    route::post('admin/pages/include/employee/create', [EmployeesController::class, 'store'])->name('admin.employee.store');
    route::get('employeeStatus/{id}', [EmployeesController::class, 'employeeStatus']);
    route::delete('employee/delete/{id}', [EmployeesController::class, 'delete']);

    //bonuscontroller
    route::get('admin/pages/include/bonus', [BonusController::class, 'bonus'])->name('admin.bonus');
    route::post('emoployees/bonus/add', [BonusController::class, 'bonusstore'])->name('admin.employee.bonus');
    route::get('bonusStatus/{id}', [BonusController::class, 'bonusStatus']);
    route::delete('bonus/delete/{id}', [BonusController::class, 'delete']);

    //attendences controller
    route::get('admin/pages/include/attendence', [AttendencesController::class, 'attendence'])->name('admin.attendence');
    route::post('employee/attendence/inTime', [AttendencesController::class, 'inTime'])->name('admin.employee.in_time');
    route::post('employee/attendence/outTime', [AttendencesController::class, 'outTime'])->name('admin.employee.out_time');
    route::delete('attendence/delete/{id}', [AttendencesController::class, 'delete']);

    //leavecontroller
    route::get('admin/pages/include/leave', [LeavesController::class, 'leave'])->name('admin.leave');
    route::post('employee/leave', [LeavesController::class, 'leavestore'])->name('admin.employee.leave');
    route::get('leaveStatus/{id}', [LeavesController::class, 'leaveStatus']);
    route::delete('leave/delete/{id}', [LeavesController::class, 'delete']);

    //department add
    route::get('admin/pages/include/department', [DepartmentController::class, 'department'])->name('admin.department');
    route::get('admin/pages/include/department/designation', [DepartmentController::class, 'depart_design'])->name('admin.department.designation');
    route::post('admin/department/create', [DepartmentController::class, 'deptStore'])->name('admin.department.store');
    route::post('admin/department/relation', [DepartmentController::class, 'deptrelation'])->name('admin.department.relation');
    route::get('departmentStatus/{id}', [DepartmentController::class, 'departmentStatus']);
    route::get('deptRelationStatus/{id}', [DepartmentController::class, 'deptRelationStatus']);
    route::delete('department/delete/{id}', [DepartmentController::class, 'delete']);
    route::delete('dept/desgn/delete/{id}', [DepartmentController::class, 'deleteelation']);

    //designation add
    route::get('admin/pages/include/designation', [DesignationController::class, 'designation'])->name('admin.designation');
    route::post('admin/designation/create', [DesignationController::class, 'store'])->name('admin.designation.store');
    route::get('designationStatus/{id}', [DesignationController::class, 'designationStatus']);
    route::delete('designation/delete/{id}', [DesignationController::class, 'delete']);

    //month add
    route::get('admin/pages/include/month', [MonthController::class, 'month'])->name('admin.month');
    route::post('admin/month/store', [MonthController::class, 'store'])->name('admin.month.store');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
