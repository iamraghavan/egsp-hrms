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
                                            <select class="form-select" id="ENGINEERINGCOURSES" onchange="populateFacultyNames()">
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
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Select Faculty Name</label>
                                            <select class="form-select" id="facultyName" onchange="getEmployeeDetails()">
                                                <option value="" selected disabled>Select Faculty Name</option>
                                                <!-- Dynamic options will be populated based on AJAX call -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

    
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="facultyDetailsContainer" class="container-fluid" style="display: none;">
                <div class="row product-page-main p-0">
                    <div class="col-xxl-12 box-col-12 order-xxl-0 order-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-page-details">
                                    <h3 id="facultyNamePlaceholder">Faculty Name</h3>
                                </div>
                                <div class="product-price">
                                   <span id="dept">  </span> | <span id="emp_id"></span>
                                </div>
                                <hr>
                                <div>
                                    <table class="product-page-width">
                                        <tbody>
                                            <tr><td><b>Date Of Joining:</b></td><td class='align-table-end' id="dateOfJoining"></td></tr>
                                            <tr><td><b>EGSPEC Experience:</b></td><td class="txt-success align-table-end" id="egspecExp"></td></tr>
                                            <tr><td><b>Other College Experience:</b></td><td class='align-table-end' id="otherCollegeExp"></td></tr>
                                            <tr><td><b>Total Experience:</b></td><td class='align-table-end' id="totalExp"></td></tr>
                                            <tr><td><b>Salary Experience:</b></td><td class='align-table-end' id="salaryExp"></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            
                                <div>
                                    <table class="product-page-width">
                                        <tbody>
                                            <tr><td><b>Designation :</b></td><td class='align-table-end' id="designation"></td></tr>
                                            <tr><td><b>UG & Status :</b></td><td class="txt-success align-table-end" id="ugCompleted"></td></tr>
                                            <tr><td><b>PG & Status :</b></td><td class='txt-success align-table-end' id="pgCompleted"></td></tr>
                                            <tr><td><b>Phd Status :</b></td><td class='txt-warning align-table-end' id="phdStatus"></td></tr>

                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <form action="/calculate-salary" method="POST">
                                    <div class="m-t-15 btn-showcase">
                                        <button type="submit" class="btn btn-primary" name="calculateSalaryBtn">
                                            <i class="fa fa-calculator me-1"></i>Calculate Salary
                                        </button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
          
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                              
<script>
    function populateFacultyNames() {
        var engineeringCourses = document.getElementById('ENGINEERINGCOURSES').value;

        // Make an AJAX request to fetch faculty names based on selected ENGINEERINGCOURSES
        axios.get(`/get-faculty-names?engineeringCourses=${engineeringCourses}`)
            .then(response => {
                // Clear existing options
                var facultySelect = document.getElementById('facultyName');
                facultySelect.innerHTML = '';

                // Add a default option
                var defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Please select the faculty name';
                facultySelect.appendChild(defaultOption);

                // Populate options based on AJAX response
                response.data.forEach(function (facultyName) {
                    var option = document.createElement('option');
                    option.value = facultyName;
                    option.text = facultyName;
                    facultySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error(error);
            });
    }
  
    function getEmployeeDetails() {
    var engineeringCourses = document.getElementById('ENGINEERINGCOURSES').value;
    var facultyName = document.getElementById('facultyName').value;
    var facultyDetailsContainer = document.getElementById('facultyDetailsContainer');
    var facultyNamePlaceholder = document.getElementById('facultyNamePlaceholder');
    var dateOfJoining = document.getElementById('dateOfJoining');
    var egspecExp = document.getElementById('egspecExp');
    var otherCollegeExp = document.getElementById('otherCollegeExp');
    var totalExp = document.getElementById('totalExp');
    var salaryExp = document.getElementById('salaryExp');

    // Check if a faculty is selected
    if (facultyName === '') {
        // Hide the faculty details container if no faculty is selected
        facultyDetailsContainer.style.display = 'none';
        return;
    }

    // Make an AJAX request to fetch employee details based on selected values
    axios.get(`/get-employee-details?engineeringCourses=${engineeringCourses}&facultyName=${facultyName}`)
        .then(response => {
            // Check if faculty details are available
            if (response.data && Object.keys(response.data).length > 0) {
                // Update the placeholders with response data
                emp_id.innerText = response.data.temp_id;
                dept.innerText = response.data.ENGINEERINGCOURSES;
                facultyNamePlaceholder.innerText = response.data.facultyName;
                dateOfJoining.innerText = response.data.dateOfJoining;
                egspecExp.innerText = response.data.egspecExp;
                otherCollegeExp.innerText = response.data.otherCollegeExp;
                totalExp.innerText = response.data.totalExp;
                salaryExp.innerText = response.data.salaryExp;
                designation.innerText = response.data.designation;
                ugCompleted.innerText = response.data.ugCompleted;
                pgCompleted.innerText = response.data.pgCompleted;
                phdStatus.innerText = response.data.phdStatus;

                // Show the faculty details container
                facultyDetailsContainer.style.display = 'block';
            } else {
                // Hide the faculty details container if no details are available
                facultyDetailsContainer.style.display = 'none';
                // Handle case when no faculty details are available
                swal('No faculty details available');
            }
        })
        .catch(error => {
            console.error(error);
        });
}

</script>


@endsection
