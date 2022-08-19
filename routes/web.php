<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\TrainingTypeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DesignationController;

use App\Mail\TestEmail;
// use DB;
// use DB;


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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    // Route::get('/home',[Controller::class, 'index']);
    // Route::get('home',function()
    // {
    //     return view('home');
    // });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');

});

// -----------------------------settings----------------------------------------//
Route::controller(SettingController::class)->group(function () {
    Route::get('company/settings/page', 'companySettings')->middleware('auth')->name('company/settings/page');

});

// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});



// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');
});

// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');
});

// ----------------------------- job ------------------------------//
Route::controller(JobController::class)->group(function () {
    Route::get('form/job/list','jobList')->name('form/job/list');
    Route::get('form/job/view', 'jobView')->name('form/job/view');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');
});

// ----------------------------- user profile ------------------------------//
// Route::controller(UserManagementController::class)->group(function () {
//     Route::get('profile_user', 'profile')->middleware('auth')->name('profile_user');
//     Route::post('profile/information/save', 'profileInformation')->name('profile/information/save');
// });

// ----------------------------- user userManagement -----------------------//
// Route::controller(UserManagementController::class)->group(function () {
//     Route::get('userManagement', 'index')->middleware('auth')->name('userManagement');
//     Route::post('user/add/save', 'addNewUserSave')->name('user/add/save');
//     Route::post('search/user/list', 'searchUser')->name('search/user/list');
//     Route::post('update', 'update')->name('update');
//     Route::post('user/delete', 'delete')->middleware('auth')->name('user/delete');
//     Route::get('activity/log', 'activityLog')->middleware('auth')->name('activity/log');
//     Route::get('activity/login/logout', 'activityLogInLogOut')->middleware('auth')->name('activity/login/logout');
// });

// ----------------------------- search user management ------------------------------//
// Route::controller(UserManagementController::class)->group(function () {
//     Route::post('search/user/list', 'searchUser')->name('search/user/list');
// });

// ----------------------------- form change password ------------------------------//
// Route::controller(UserManagementController::class)->group(function () {
//     Route::get('change/password', 'changePasswordView')->middleware('auth')->name('change/password');
//     Route::post('change/password/db', 'changePasswordDB')->name('change/password/db');
// });



// ----------------------------- form employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('all/employee/card', 'cardAllEmployee')->middleware('auth')->name('all/employee/card');
    Route::get('all/employee/list', 'listAllEmployee')->middleware('auth')->name('all/employee/list');
    Route::post('all/employee/save', 'saveRecord')->middleware('auth')->name('all/employee/save');
    Route::get('all/employee/view/edit/{employee_id}', 'viewRecord')->middleware('auth');
    Route::post('all/employee/update', 'updateRecord')->middleware('auth')->name('all/employee/update');
    Route::get('all/employee/delete/{employee_id}', 'deleteRecord')->middleware('auth');
    Route::post('all/employee/search', 'employeeSearch')->name('all/employee/search');
    Route::post('all/employee/list/search', 'employeeListSearch')->name('all/employee/list/search');

    Route::get('form/departments/page', 'index')->middleware('auth')->name('form/departments/page');
    Route::post('form/departments/save', 'saveRecordDepartment')->middleware('auth')->name('form/departments/save');
    Route::post('form/department/update', 'updateRecordDepartment')->middleware('auth')->name('form/department/update');
    Route::post('form/department/delete', 'deleteRecordDepartment')->middleware('auth')->name('form/department/delete');

    // Route::get('form/designations/page', 'designationsIndex')->middleware('auth')->name('form/designations/page');
    // Route::post('form/designations/save', 'saveRecordDesignations')->middleware('auth')->name('form/designations/save');
    // Route::post('form/designations/update', 'updateRecordDesignations')->middleware('auth')->name('form/designations/update');
    // Route::post('form/designations/delete', 'deleteRecordDesignations')->middleware('auth')->name('form/designations/delete');

    // Route::get('form/timesheet/page', 'timeSheetIndex')->middleware('auth')->name('form/timesheet/page');
    // Route::post('form/timesheet/save', 'saveRecordTimeSheets')->middleware('auth')->name('form/timesheet/save');
    // Route::post('form/timesheet/update', 'updateRecordTimeSheets')->middleware('auth')->name('form/timesheet/update');
    // Route::post('form/timesheet/delete', 'deleteRecordTimeSheets')->middleware('auth')->name('form/timesheet/delete');

    // Route::get('form/overtime/page', 'overTimeIndex')->middleware('auth')->name('form/overtime/page');
    // Route::post('form/overtime/save', 'saveRecordOverTime')->middleware('auth')->name('form/overtime/save');
    // Route::post('form/overtime/update', 'updateRecordOverTime')->middleware('auth')->name('form/overtime/update');
    // Route::post('form/overtime/delete', 'deleteRecordOverTime')->middleware('auth')->name('form/overtime/delete');
});

// ----------------------------- profile employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('employee/profile/{rec_id}', 'profileEmployee')->middleware('auth');
});



// ----------------------------- form payroll  ------------------------------//
Route::controller(PayrollController::class)->group(function () {
    Route::get('form/salary/page', 'salary')->middleware('auth')->name('form/salary/page');
    Route::post('form/salary/save','saveRecord')->middleware('auth')->name('form/salary/save');
    Route::post('form/salary/update', 'updateRecord')->middleware('auth')->name('form/salary/update');
    Route::post('form/salary/delete', 'deleteRecord')->middleware('auth')->name('form/salary/delete');
    Route::post('salary/search', 'search')->middleware('auth')->name('salary/search');
    Route::get('form/salary/view/{rec_id}', 'salaryView')->middleware('auth');
    Route::get('form/payroll/items', 'payrollItems')->middleware('auth')->name('form/payroll/items');
});




// --------------------------------------- Designation ------------------------------------------


Route::get('get_designation/{id}', [DesignationController::class, 'get_desg']);
Route::get('del_img/{id}', [EmployeeController::class, 'del_img']);


Route::get('/designation', [DesignationController::class, 'index'])->name('/designation');
Route::post('/designation', [DesignationController::class, 'store'])->name('designation');
Route::post('/designation/update', [DesignationController::class, 'update'])->name('designation/update');
Route::post('/designation/delete', [DesignationController::class, 'delete'])->name('designation/delete');



Route::get('send_pdf/{id}', [PayrollController::class, 'send_pdf']);
