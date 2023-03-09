<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class EmployeeController extends BaseController
{
    //

    public function get_employees()
    {
        //  ORM      Employee::all();                    select * from Employees;
        try
        {
            // select * from employees where
            $employees = Employee::all(); // To get All Employees
            $employees = Employee::select('name','Marital_status')->get(); // to get Two colums for all employees
            $employees = Employee::where('id','=','1')->get();
            $employees = Employee::where('id','=','1')->orwhere('id','=','10')->get();
            $employees = Employee::where('id','=','1')->orwhere([
                ['id','=','10'],
            ])->get();
            $employees = Employee::where([
                ['id','=','1'],
            ])->get(); // to filter Data

            return $this->sendResponse($employees,'Data has been fetched');
        }catch(Exception  $e)
        {
            return $this->sendError($e,'Data hasnot been fetched');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'Marital_status'=>'required',
            'salary'=>'required|integer',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $employee = Employee::find($request->id); // to get row which equals that id and update this record
        $employee->name = $request->name;
        $employee->Marital_status = $request->Marital_status;
        $employee->salary = $request->salary;
        $employee->save();

        return $this->sendResponse($employee,'Data has been updated');
    }
}
