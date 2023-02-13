<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    // // SHOW ALL EMPLOYEES
    // public function index()
    // {
    //     return view('listings.show', [
    //         'employees' =>  Employee::latest()->paginate(10)
    //     ]);
    // }

    // //SHOW SINGLE EMPLOYEE
    // public function show(Employee $employee)
    // {
    //     return view('listings.show', [
    //         'employee' => $employee
    //     ]);
    // }

    // SHOW CREATE FORM
    public function create()
    {
        return view('employees.create-employee');
    }

    // SHOW EDIT FORM
    public function edit(Employee $employee)
    {
        return view('employees.edit-employee', ['employee' => $employee]);
    }

    // STORE LISTING DATA
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'companyId' => 'required',
            'email' => [Rule::unique('employees', 'email')],
            'phone' => [Rule::unique('employees', 'phone')]
        ]);

        Employee::create($formFields);
        // TO SHOW FLASH MESSAGE ->with('message' , 'Listing created Successfully')
        return redirect('/listings')->with('message', 'Employee Added Successfully');
    }

    // UPDATE LISTING DATA
    public function update(Request $request, Employee $employee)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'companyId' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable'
        ]);

        $employee->update($formFields);
        // TO SHOW FLASH MESSAGE ->with('message' , 'Listing created Successfully')
        return back()->with('message', 'Employee details updated Successfully');
    }

    // DELETE LISTING
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/listings')->with('message', 'Employee fired successfully');
    }
}
