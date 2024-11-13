<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\Employee_model; // Assuming your model is named Employee

class Add_employeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request)
    {
        // Form Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|max:15',
            'phone' => 'required|digits:10',
        ]);

        // Insert data into database
        $employee = new Employee_model();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = $request->input('password');
        $employee->phone = $request->input('phone');
        $employee->save(); // Save the record to the database

        // Redirect or return a response
        return redirect('employees/add_employee')->back()->with('success', 'Employee added successfully!');
    }

    public function show()
    {
        // Fetch all employees from the database
        $employees = Employee_model::all();

        // Pass the data to the view
        return view('employees.show_employee', compact('employees'));
    }

    public function delete($id)
    {
        $employee = Employee_model::find($id);
        $employee->delete();
        return redirect()->back()->with('delete','Employee Deleted Successfully');
    }

    public function edit($id)
    {
        $edit_employee = Employee_model::find($id);
        return view('employees.edit_employee', compact('edit_employee'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id, // Ignore unique validation for the current employee
            'password' => 'required|string|max:15',
            'phone' => 'required|digits:10',
        ]);

        $employee = Employee_model::find($id);

        if ($employee) {
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->password = $request->input('password');
            $employee->phone = $request->input('phone');
            $employee->save();
        } else {
            return redirect()->route('show.employee')->with('error', 'Employee not found.');
        }

        return redirect()->route('show.employee')->with('success', 'Employee updated successfully!');
    }


}
