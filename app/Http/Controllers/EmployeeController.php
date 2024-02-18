<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Adjust the namespace to Models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{


    public function getFacultyNames(Request $request)
{
    $engineeringCourses = $request->input('engineeringCourses');

    // Retrieve distinct faculty names based on selected ENGINEERINGCOURSES
    $facultyNames = Employee::where('ENGINEERINGCOURSES', $engineeringCourses)
        ->pluck('facultyName')
        ->unique()
        ->values()
        ->toArray();

    return response()->json($facultyNames);
}

public function getEmployeeDetails(Request $request)
{
    $engineeringCourses = $request->input('engineeringCourses');
    $facultyName = $request->input('facultyName');

    // Retrieve employee details based on selected values
    $employeeDetails = Employee::where('ENGINEERINGCOURSES', $engineeringCourses)
        ->where('facultyName', $facultyName)
        ->first();

    return response()->json($employeeDetails);
}


    public function addEmployee(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'temp_id' => 'required|string',
            'facultyName' => 'required|string',
            'ENGINEERINGCOURSES' => 'required|string',
            'dateOfJoining' => 'required|date',
            'egspecExp' => 'required|string',
            'otherCollegeExp' => 'required|string',
            'totalExp' => 'required|string',
            'salaryExp' => 'required|string',
            'designation' => 'required|string',
            'ugCompleted' => 'required|string',
            'pgCompleted' => 'required|string',
            'phdStatus' => 'string',
            // Add any other validation rules for additional form fields
        ]);

        // Create a new employee using the validated data
        $employee = Employee::create($validatedData);

        
        // Redirect back with success message
        return redirect()->back()->with('success', 'Employee added successfully');

    }

    
}
