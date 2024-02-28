@extends('layouts.app')
@section('content')

<div class="page-wrapper default-wrapper" id="pageWrapper">
    @include('components.h-nav')

    <div class="page-body-wrapper default-menu default-menu">
        @include('components.v-nav')

        @if(session('success'))
        <div class="alert alert-light-success" role="alert">
            <div class="txt-success">
                <b>{{ session('success') }}</b>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6 ps-0">
                            <h3>Calculate Employee Salary</h3>
                        </div>
                        <div class="col-sm-6 pe-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">
                                        <svg class="stroke-icon">
                                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg>
                                    </a></li>
                                <li class="breadcrumb-item active">Calculate Employee Salary</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-light-success" role="alert">
                <div class="txt-success">
                    <b>{{ session('success') }}</b>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">


                         

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Select Engineering Course</label>
                                            <select class="form-select" id="filterByCourse" onchange="filterTable()">
                                                <option value="" selected disabled>Select Engineering Course</option>
                                                <optgroup label="B.E / B.Tech">
                                                    <option value="MECHANICAL">Mechanical Engineering (B.E / B.Tech)</option>
                                                    <option value="CIVIL">Civil Engineering (B.E / B.Tech)</option>
                                                    <option value="EEE">Electrical and Electronics Engineering (B.E / B.Tech)</option>
                                                    <option value="ECE">Electronics and Communication Engineering (B.E / B.Tech)</option>
                                                    <option value="CSE">Computer Science and Engineering (B.E / B.Tech)</option>
                                                    <option value="IT">Information Technology (B.E / B.Tech)</option>
                                                    <option value="BIO">Biomedical Engineering (B.E / B.Tech)</option>
                                                    <option value="CSBS">Computer Science & Business Systems Engineering (B.E / B.Tech)</option>
                                                </optgroup>
                                                <optgroup label="M.E / M.Tech">
                                                    <option value="MECH-PG">Manufacturing Engineering (M.E / M.Tech)</option>
                                                    <option value="CSE-PG">Computer Science and Engineering (M.E / M.Tech)</option>
                                                    <option value="EEE-PG">Power Electronics and Drives (M.E / M.Tech)</option>
                                                    <option value="ECE-PG">Communication Systems (M.E / M.Tech)</option>
                                                    <option value="CIVIL-PG">Environmental Engineering (M.E / M.Tech)</option>
                                                </optgroup>
                                                <option value="MCA">MCA</option>
                                                <option value="MBA">MBA</option>
                                                <option value="SAH">Science & Humanities</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                  

                                   
                                </div>
                               
                                <div class="table-responsive">
                                    <table class="table table-striped text-center" id="employeeTable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Employee ID</th>
                                                <th>Faculty Name</th>
                                                <th>Engineering Course</th>
                                                <th>EGSPEC Experience</th>
                                                <th>Other College Experience</th>
                                                <th>Total Experience</th>
                                                <th>Date of Joining</th>
                                                <th>Salary Experience</th>
                                                <th>Designation</th>
                                                {{-- <th>UG Completed</th>
                                                <th>PG Completed</th>
                                                <th>PhD Status</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                    <div id="noDataMessage" class="text-center text-muted mt-3">
                                        <img src="{{ asset('/assets/data-amico.svg') }}" alt="No Data Icon" style="max-width: 400px; height: auto;">
                                        <p>No employee data available.</p>
                                    </div>
                                    
                                
                                </div>
                                
                                </div>
                            
                                <!-- Pagination -->
                                <div class="mt-3">{{ $employees->links() }}</div>
                                
                           
                             
                          
                            
    
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>


     
          
    </div>
</div>




<script>
    function filterTable() {
        try {
            var selectedCourse = document.getElementById('filterByCourse').value;

            // Make an AJAX request to the server only if a course is selected
            if (selectedCourse) {
                $.ajax({
                    url: '/get/employee',
                    method: 'GET',
                    data: { filterByCourse: selectedCourse },
                    success: function (data) {
                        // Clear existing table rows
                        $('#employeeTable tbody').empty();

                        if (data.length > 0) {
                            // Show table and its header
                            $('#employeeTable').show();
                            $('#noDataMessage').hide();

                            // Append new rows based on the JSON data
                            $.each(data, function (index, employee) {
                                var row = '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + employee.temp_id + '</td>' +
                                    '<td>' + employee.facultyName + '</td>' +
                                    '<td>' + employee.ENGINEERINGCOURSES + '</td>' +
                                    '<td>' + employee.egspecExp + '</td>' +
                                    '<td>' + employee.otherCollegeExp + '</td>' +
                                    '<td>' + employee.totalExp + '</td>' +
                                    '<td>' + employee.dateOfJoining + '</td>' +
                                    '<td>' + employee.salaryExp + '</td>' +
                                    '<td>' + employee.designation + '</td>' +
                                    '<td>' +
                                    '<a href="/employee/edit/' + employee.temp_id + '"><button class="btn btn-sm btn-primary my-1 mx-1"><i class="fas fa-edit"></i></button></a>' +
                                    '<a href="/employee/delete/' + employee.temp_id + '"><button class="btn btn-sm btn-danger my-1 mx-1"><i class="fas fa-trash-alt"></i></button></a>' +
                                    '<a href="/employee/calculate/salary/' + employee.temp_id + '"><button class="btn btn-sm btn-success my-1 mx-1"><i class="fas fa-money"></i> Salary </button></a>' +
                                    '</td>' +
                                    '</tr>';

                                // Append the row to the table
                                $('#employeeTable tbody').append(row);
                            });
                        } else {
                            // Hide table if no data and show no data message
                            $('#employeeTable').hide();
                            $('#noDataMessage').show();
                        }
                    },
                    error: function (error) {
                        console.log('Error fetching data: ' + JSON.stringify(error));
                        // Handle error by showing an error message
                        $('#employeeTable').hide();
                        $('#noDataMessage').text('Error fetching data. Please try again later.').show();
                    }
                });
            } else {
                // Hide table if no course is selected and show no data message
                $('#employeeTable').hide();
                $('#noDataMessage').show();
            }
        } catch (error) {
            console.error('An error occurred: ' + error.message);
            // Handle error by showing an error message
            $('#employeeTable').hide();
            $('#noDataMessage').text('An error occurred. Please try again later.').show();
        }
    }
</script>





@endsection
