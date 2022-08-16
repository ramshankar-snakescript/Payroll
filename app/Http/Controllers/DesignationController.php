<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\department;
use App\Models\designation;
use DB;

class DesignationController extends Controller
{
    public function index(){

        $department = DB::table('departments')->select('*')->get()->toArray();
            $designation = DB::table("designation")
                                ->join("departments", function($join){
                                    $join->on("departments.id", "=", "designation.dept_id");
                                })
                                ->select("departments.department", "designation.*", "departments.id as dept")
                                ->get()
                                ->toArray();
        return view('form.Designation', compact('department', 'designation'));
    }

    public function store(Request $request){

        $request->validate([
            'dept' => 'required',
            'designation' => 'required',

        ]);
            $desg = new designation;
            $desg->dept_id = $request->dept;
            $desg->designation = $request->designation;
            $desg->save();
            Toastr::success('Designation Added :)','Success');
            return redirect()->route('designation');

    }

    public function update(Request $request){
        $designation = [
            'id'=>$request->id,
            'dept_id'=>$request->department_id,
            'designation'=>$request->designation
        ];
        designation::where('id',$request->id)->update($designation);

        DB::commit();
        Toastr::success('updated record successfully :)','Success');
        return redirect()->route('/designation');
    }

    public function delete(Request $request)
    {
        try {

            designation::destroy($request->id);
            Toastr::success('Designations deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Department delete fail :)','Error');
            return redirect()->back();
        }
    }

    public function get_desg($id)
    {

        // $id = $request->id;
        $data = DB::table("designation")
        ->where('dept_id','=',$id)
        ->select('id','designation')
        ->get();

       return $data;

    }
}
