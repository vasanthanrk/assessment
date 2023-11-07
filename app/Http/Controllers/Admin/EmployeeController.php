<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeEditValidationRequest;
use App\Http\Requests\EmployeeValidationRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::get();
        return view('admin.employees.index', compact('employees'));
    }

    public function add()
    {
        $companies = Company::get();
        return view('admin.employees.create', compact('companies'));
    }

    public function store(EmployeeValidationRequest $request)
    {

        $upload_data = $request->input();

        $employee = new Employee();

        $employee->first_name = $upload_data['first_name'];
        $employee->last_name = $upload_data['last_name'];
        $employee->email = $upload_data['email']??'';
        $employee->company = $upload_data['company'];
        $employee->phone = $upload_data['phone']??'';
        $employee->save();
        return redirect()->back()->with('success', 'Employee is added successfully.');

    }


    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('admin.employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeEditValidationRequest $request, Employee $employee)
    {
        $update = $request->validated();
        $employee->update($update);
        return redirect()->back()->with('success', 'Employee is updated successfully.');
    }

    public function delete($id)
    {
        DB::table('employees')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Employee is deleted successfully.');
    }
}
