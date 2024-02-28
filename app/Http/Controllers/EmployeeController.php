<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Adjust the namespace to Models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{

    public function update(Request $request, $emp_id)
    {

        $request->validate([
            'facultyName' => 'required',
            'ENGINEERINGCOURSES' => 'required',
            'dateOfJoining' => 'required',
            'egspecExp' => 'required',
            'otherCollegeExp' => 'required',
            'totalExp' => 'required',
            'salaryExp' => 'required',
            'designation' => 'required',
            'ugCompleted' => 'required',
            'pgCompleted' => 'required',
            'phdStatus' => 'nullable',
            'designationID' => 'required',
            'researchPapers' => 'nullable'
        ]);


        // Assuming 'id' is the primary key of your Employee model
        $updateEmployee = Employee::where('temp_id', $emp_id)->first();

        $updateEmployee->facultyName = request('facultyName');
        $updateEmployee->ENGINEERINGCOURSES = request('ENGINEERINGCOURSES');
        $updateEmployee->dateOfJoining = request('dateOfJoining');
        $updateEmployee->egspecExp = request('egspecExp');
        $updateEmployee->otherCollegeExp = request('otherCollegeExp');
        $updateEmployee->totalExp = request('totalExp');
        $updateEmployee->salaryExp = request('salaryExp');
        $updateEmployee->designation = request('designation');
        $updateEmployee->ugCompleted = request('ugCompleted');
        $updateEmployee->pgCompleted = request('pgCompleted');
        $updateEmployee->phdStatus = request('phdStatus');
        $updateEmployee->designationID = request('designationID');
        $updateEmployee->researchPapers = request('researchPapers');


        $updateEmployee->save();

        return redirect()->route('pages.calculate')->with('success', 'Employee updated successfully');
    }


    public function getEmployee(Request $request)
    {
        $selectedCourse = $request->input('filterByCourse');

        // Perform your query based on the selected course
        $filteredData = Employee::where('ENGINEERINGCOURSES', $selectedCourse)->get();

        // Return the filtered data as JSON
        return response()->json($filteredData);
    }
    public function deleteEmployeeData($emp_id)

    {




        $employee = Employee::where('temp_id', $emp_id)->first();

        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully');
    }


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

        $query = Employee::query();

        // Filter by Engineering Course
        if ($request->has('filterByCourse')) {
            $query->where('ENGINEERINGCOURSES', $request->input('filterByCourse'));
        }

        // Filter by Faculty Name
        if ($request->has('filterByFacultyName')) {
            $query->where('facultyName', 'LIKE', '%' . $request->input('filterByFacultyName') . '%');
        }

        // Get the filtered employees
        $employees = $query->get();

        // Retrieve details of a specific employee
        $employeeDetails = Employee::where('ENGINEERINGCOURSES', $engineeringCourses)
            ->where('facultyName', $facultyName)
            ->first();

        // Return the response
        return response()->json(['employees' => $employees, 'employeeDetails' => $employeeDetails]);
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
            'phdStatus' => 'nullable|string',
            'designationID' => 'required|string',
            'researchPapers' => 'nullable|integer'
            // Add any other validation rules for additional form fields
        ]);

        // Create a new employee using the validated data
        $employee = Employee::create($validatedData);


        // Redirect back with success message
        return redirect()->back()->with('success', 'Employee added successfully');
    }
}
