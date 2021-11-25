<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeDetails;
use DB;
use cache;

class EmployeeController extends Controller
{


public function index(){

//the employee:all is a key which stores the values in the memory of the server

    $employeeList = cache('employee:all', function () {

        return DB::table('employee_details')
        ->join('departments', 'departments.id', '=', 'employee_details.department_id')
        ->join('salary_types', 'salary_types.id', '=', 'employee_details.salarytype_id')
        ->select('employee_details.*', 'departments.name', 'salary_types.type')->orderBy('employee_details.id','DESC')
        ->get();

    });


    // cache()->forget('employee:all');



return response()->json($employeeList);


}



public function create(Request $request){
    $validated = $request->validate([
        'salarytype_id' => 'required',
        'department_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'work_hours' => 'required',
        'salary' => 'required',
    ]);

    // return dd($request);
    $post = EmployeeDetails::create($request->all());

    return response()->json(['success' => 'data has been successfully added'], 200);


}



public function update(Request $request,$id)
{
    $request->validate([
        'salarytype_id' => 'required',
        'department_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'work_hours' => 'required|numeric',
        'salary' => 'required',


    ]);


    cache()->forget('employee:all');

    $employee = EmployeeDetails::find($id);

    $employee->update($request->all());
    $data=EmployeeDetails::orderBy('id','DESC')->get();
    return response()->json($data);


}




public function destroy($id) {
    cache()->forget('employee:all');
	EmployeeDetails::findOrFail($id)->delete();
}











}
