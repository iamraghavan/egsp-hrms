@extends('layouts.app')
@section('content')




<script>

function calculateAndDisplaySalaryExp() {
    const egspecExp = parseFloat(document.getElementById('egspecExp').value) || 0;
    const otherCollegeExp = parseFloat(document.getElementById('otherCollegeExp').value) || 0;

    // Check if both inputs are valid numbers
    if (!isNaN(egspecExp) && !isNaN(otherCollegeExp)) {
        // Calculate the total experience: EGSPEC + Other College Exp.
        let totalExp = egspecExp + otherCollegeExp;
        let dividedValue = (egspecExp + otherCollegeExp) / 5;

        // Round the total experience to the nearest whole number
        let roundedTotalExp = Math.ceil(totalExp);
        let roundedDividedValue = Math.round(dividedValue);

        // Display the rounded total experience in the 'salaryExp' input
        document.getElementById('salaryExp').value = roundedDividedValue;
        document.getElementById('totalExp').value = roundedTotalExp;
    } else {
        // Clear the 'salaryExp' input if inputs are not valid numbers
        document.getElementById('salaryExp').value = 'Enter Experience in Years';
        document.getElementById('totalExp').value = 'Enter Experience in Years';
    }
}

function generateEmployeeID() {
        // Get the values from the form elements
        const egspecValue = "EGSPEC";
        const departmentValue = document.getElementById('ENGINEERINGCOURSES').value;

        // Generate a timestamp for time in mmss format
        const timestamp = new Date();
        const mmss = ('0' + timestamp.getMinutes()).slice(-2) + ('0' + timestamp.getSeconds()).slice(-2);

        // Create the employee ID by concatenating the values with the specified format
        const employeeID = `${egspecValue}-${departmentValue}-${mmss}`;

        // Display the generated employee ID in the 'tempID' input
        document.getElementById('tempID').value = employeeID;
    }



    function validateAndAlert(input) {
        const inputValue = input.value;

        // Validate if the input is a valid number
        const isNumeric = /^[0-9]+(?:\.[0-9]+)?$/.test(inputValue);

        if (isNumeric && inputValue.includes('.')) {
            // Convert decimal to years and months
            const years = Math.floor(parseFloat(inputValue));
            const months = Math.round((parseFloat(inputValue) - years) * 12);

            
       
        }
    }


    function convertToUpperCase(input) {
        input.value = input.value.toUpperCase();
    }

    function validateInput(event) {
        const allowedChars = /^[a-zA-Z\s'()-]+$/;

        if (!allowedChars.test(event.key)) {
            event.preventDefault();
        }
    }
  
  
    function formatDate(input) {
        const inputValue = input.value;

        // Automatically insert slashes while typing
        if (inputValue.length === 2 && inputValue.indexOf('/') === -1) {
            input.value += '/';
        } else if (inputValue.length === 5 && inputValue.indexOf('/', 3) === -1) {
            input.value += '/';
        }

        // Check if the input value matches the desired date format
        const dateFormatRegex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;
        if (!dateFormatRegex.test(inputValue) && inputValue.trim() !== "") {
            // Show SweetAlert for incorrect input
            Swal.fire({
                title: "Invalid Date Format",
                text: "Please enter the date in DD-MM-YYYY format",
                icon: "error",
                confirmButtonText: "OK",
            });

            // Clear the input value
            input.value = "";
        }
    }
    
    
</script>

<div class="page-wrapper default-wrapper" id="pageWrapper">

    @include('components.h-nav')

    <div class="page-body-wrapper default-menu default-menu">

        @include('components.v-nav')

        @if(session('success'))
        <div class="alert alert-light-success" role="alert">
            <div class="txt-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('success'))
    <script>
        (function ($) {
            "use strict";
            var notify = $.notify({
                title: '<strong>Success!</strong>',
                message: '{{ session('success') }}'
            }, {
                type: 'success',
                allow_dismiss: true,
                delay: 2000,
                showProgressbar: true,
                timer: 300,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
            });
            setTimeout(function () {
                notify.update('message', '<strong>Success!</strong> {{ session('success') }}');
            }, 1000);
        })(jQuery);
    </script>
@endif



        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-sm-6 ps-0">
                    <h3>
                        Edit Employee Details | {{ $employee->temp_id ? $employee->temp_id : 'Loading....' }}
                    </h3>
                  </div>
                  <div class="col-sm-6 pe-0">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">                                       
                          <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item active">Edit Employee Details </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

           @if(session('success'))
            <div class="alert alert-light-success" role="alert">
                <div class="txt-success">
                   <b> {{ session('success') }} </b>
                   <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                </div>
            </div>
        @endif

            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">  
                  <div class="card">
                    <div class="card-body">

                
                   <form action="/employee/update/{{$employee->temp_id}}" method="POST">
    @csrf
    @method('PUT')
                            <div class="form theme-form">
                                <div class="row">
                                   <input value={{ $employee->temp_id }} class="form-control" type="hidden"
                                    id="tempID" name="temp_id" placeholder="Employee ID">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="facultyName">Name of the Faculty</label>
                                            <input  value="{{ $employee->facultyName  }}"
                                             class="form-control" type="text" 
                                             id="facultyName" name="facultyName" placeholder="Name of the Faculty" oninput="convertToUpperCase(this)" onkeypress="validateInput(event)">
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="department">Department</label>
                                            <select class="form-select"  name="ENGINEERINGCOURSES" id="ENGINEERINGCOURSES" onchange="generateEmployeeID()">
                                                <option value="{{old('ENGINEERINGCOURSES', $employee->ENGINEERINGCOURSES )}}" selected disabled>{{$employee->ENGINEERINGCOURSES}}</option>
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
                        
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="dateOfJoining">Date of Joining</label>
                                            <input class="form-control" value="{{ $employee->dateOfJoining  }}" type="date" id="dateOfJoining" name="dateOfJoining" placeholder="DD-MM-YYYY">
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="egspecExp">EGSPEC Exp</label>
                                            <input value="{{ $employee->egspecExp  }}" class="form-control" type="text" id="egspecExp" name="egspecExp" placeholder="EGSPEC Exp" oninput="calculateAndDisplaySalaryExp(); validateAndAlert(this)">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="otherCollegeExp">Other College Exp</label>
                                            <input value="{{ $employee->otherCollegeExp  }}" class="form-control" type="text" id="otherCollegeExp" name="otherCollegeExp" placeholder="Other College Exp" oninput="calculateAndDisplaySalaryExp(); validateAndAlert(this)">
                                        </div>
                                    </div>
                                    
                                </div>
                        
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="totalExp">Total Exp</label>
                                            <input value="{{ $employee->totalExp  }}" class="form-control" readonly  diabled type="text" id="totalExp" name="totalExp" placeholder="Total Exp">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="salaryExp">Salary Experience</label>
                                            <input value="{{ $employee->salaryExp  }}" class="form-control" readonly  type="text" id="salaryExp" name="salaryExp" placeholder="Salary Experience">
                                        </div>
                                    </div>

                                                               <div class="col">
                                       <div class="mb-3">
    <label for="designation">Designation</label>
    <select class="form-select" id="designationid" name="designationID">
        <option value="" selected disabled>Select Designation</option>
        @foreach($norms as $norm)
            <option value="{{ $norm->designationID }}">{{ $norm->title }}</option>
        @endforeach
    </select>
</div>

                                    </div>

                                       <div style="display:none !important;"  class="mb-3">
    <label for="ugCompleted">Designation</label>
    <input class="form-control" type="text" id="designation" name="designation" placeholder="" readonly>
</div>
                                </div>
                        
                                <div class="row">
                                  
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="ugCompleted">UG & Completed</label>
                                            <input value="{{ $employee->ugCompleted  }}" class="form-control" type="text" id="ugCompleted" name="ugCompleted" placeholder="UG & Completed">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="pgCompleted">PG & Completed</label>
                                            <input value="{{ $employee->pgCompleted  }}" class="form-control" type="text" id="pgCompleted" name="pgCompleted" placeholder="PG & Completed">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="phdStatus">Ph.D. & Status</label>
                                            <input  value="{{ $employee->phdStatus ? $employee->phdStatus : '' }}" class="form-control" type="text" id="phdStatus" name="phdStatus" placeholder="Ph.D. & Status">
                                        </div>
                                    </div>
                                </div>
                        
                              
                            
                        
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary me-3">Update Data</button>
                                     <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid Ends-->
          </div>

    </div>



</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

<script>

    $(document).ready(function () {
    $('#designationid').change(function () {
        // Get the selected designation title
        var selectedTitle = $('#designationid option:selected').text();

        // Set the value in the input field
        $('#designation').val(selectedTitle);
    });
});

    $(document).ready(function () {
        // Disable submit button initially
        $("button[type='submit']").prop("disabled", true);

        // Function to check if any input field is empty
        function checkEmptyFields() {
            var isEmpty = false;
            $("form input:not([name='phdStatus']), form select").each(function () {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false; // Exit loop early if an empty field is found
                }
            });
            return isEmpty;
        }

        // Enable/disable submit button based on input field values
        $("form input:not([name='phdStatus']), form select").on("input change", function () {
            $("button[type='submit']").prop("disabled", checkEmptyFields());
        });

        $("form").submit(function (event) {
            // Show a loading notification
            $.notify(
                {
                    message: "<strong>Loading:</strong> Please wait...",
                },
                {
                    type: "info",
                    allow_dismiss: true,
                    delay: 2000,
                    showProgressbar: true,
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                }
            );
        });
    });
</script>


@endsection