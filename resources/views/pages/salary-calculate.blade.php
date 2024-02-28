@extends('layouts.app')
@section('content')


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
                        
                    </h3>
                  </div>
                  <div class="col-sm-6 pe-0">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">                                       
                          <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item active">Salary Calculate </li>
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
                  <div class="card-header card-no-border pb-0">
                    <h3 class="fs-700"> <span class="text-danger"> {{$employee->facultyName}} </span> - <span class="text-info"> {{ $employee->temp_id ? $employee->temp_id : 'Loading....' }} </span></h3>
                    
                  </div>
                  <div class="card-body">
                    
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                         <div class="flex-space flex-wrap align-items-center">
                
                            <ul class="d-flex flex-column gap-1 mt-3">
                              <li> <strong>Department :</strong> {{$employee->ENGINEERINGCOURSES}}</li>
                              <li> <strong>Designation :</strong> {{$employee->designation}} </li>
                              <li><strong>EGSPEC Experience: </strong> {{$employee->egspecExp}} </li>
                              <li><strong>Other College Experience: </strong> {{$employee->otherCollegeExp}} </li>
                              <li><strong>Total Experience: </strong> {{$employee->totalExp}} </li>
                              <li><strong>Salary Experience: </strong> {{$employee->salaryExp}} </li>
                              <li><strong>No.of Research Papers: </strong> {{$employee->researchPapers}} </li>
                            </ul>
                          </div>
                      </div>
                      
                    
                    </div>
                  </div>
                </div>
                  
                  
                    
                </div>
              </div>
            </div>



            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">

                        <div class="col-xl-12">
  <form class="card" id="salaryForm">
                    <div class="card-header pb-0">
                      <h3 class="card-title mb-0">Salary Details</h3>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="mb-3">
                            <label class="form-label">Basic Salary</label>
                            <input class="form-control" type="text" name="basicSalary" id="basicSalary"  readonly placeholder="Basic Salary" value={{$employeeData->basicSalary}}>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Grade Pay</label>
                            <input class="form-control" type="text" id="agp" name="agp" readonly placeholder="Grade Pay"  value={{$employeeData->agp}}>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Research + HOD</label>
                            <input class="form-control" type="text" id="rHOD" name="rHOD" placeholder="Research + HOD" value="">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Salary Experience</label>
                            <input class="form-control" type="text" name="salaryExp" id="salaryExp" readonly placeholder="Salary Experience" value=''>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">House Rent Allowance (HRA)</label>
                            <input class="form-control" id="hra" name="hra" type="text" readonly placeholder="HRA" value={{$employeeData->hra}}>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">


                            <label class="form-label">Dearness Allowance (%)</label>
                                           <div class="input-group">
                      
                      <button class="btn btn-info" id="daPercentage" type="button">{{$employeeData->daPercentage}} %</button>
                
                      <input class="form-control" name="daValue" type="text" placeholder="" readonly id="daValue" aria-label="">
                    </div>

   

                            
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Gross Salary</label>
                            <input class="form-control" id="gSalary" name="gSalary" type="text" readonly placeholder="Gross Salary">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Additional Pay</label>
                            <input class="form-control" id="aPay" name="aPay" type="text" readonly placeholder="Additional Pay">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Different</label>
                            <input class="form-control" id="different" name="different" type="text" readonly placeholder="Different">
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Diff. / Actual</label>
                            <input class="form-control" id="diffAct" type="text" name="diffAct" readonly placeholder="Diff. / Actual">
                          </div>
                        </div>
                        

                                                 <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Actual</label>
                            <input class="form-control" id="actualPay" type="text" name="actualPay" readonly placeholder="Actual Pay">
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Current Salary drawn</label>
                            <input class="form-control" id="csd" type="text" name="csd" placeholder="current salary">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">Save Salary Data</button>
                    </div>
                  </form>
        
                        </div>

                        
                    </div>
                </div>
            </div>

          


        </div>
    </div>
</div>

            <!-- Container-fluid Ends-->
          </div>

    </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
     $(document).ready(function () {
            // Employee data from the server
            var employeeData = {
                designation: "{{$employee->designation}}",
               
            };

let researchPapers = "{{$employee->researchPapers}}"


function calculateResearchPapers(researchPapers) {
    var researchPapersAllowance = 0;

    switch (designation) {
        case 'Assistant Professor (Engineering)':
        case 'Assistant Professor (MBA, MCA and S&H)':
        case 'Assistant Professor + Ph.D. doing (Engineering)':
        case 'Assistant Professor + Ph.D. doing (MBA, MCA and S&H)':
            // No Research Papers allowance for these designations
            break;
        case 'Assistant Professor + Ph.D. (Engineering)':
            researchPapersAllowance = 2000;
            break;
        case 'Assistant Professor + Ph.D. (MBA, MCA and S&H)':
            researchPapersAllowance = 2000;
            break;
        case 'Associate Professor (Engineering)':
        case 'Associate Professor (MBA, MCA and S&H)':
            if (researchPapers > 6) {
                researchPapersAllowance = 2000;
            }
            break;
        case 'Professor (Engineering)':
        case 'Professor (MBA, MCA and S&H)':
            if (researchPapers > 10) {
                researchPapersAllowance = 2000;
            }
            break;
        default:
            console.error("Invalid designation");
            break;
    }

    return researchPapersAllowance;
}






            let salayExpereince = "{{$employee->salaryExp}}"

            function calculateHRA(salayExpereince) {
    
    
    
    
                var hra = 0;


    // Check conditions for HRA calculation based on designation
    switch (designation) {
        case 'Assistant Professor (Engineering)':
        case 'Assistant Professor (MBA, MCA and S&H)':
            // HRA is 1000 if above 5 years of Salary Exp.
            if (salayExpereince > 5) {
                hra = 1000;
            }
            break;

        case 'Assistant Professor + Ph.D. doing (Engineering)':
        case 'Assistant Professor + Ph.D. doing (MBA, MCA and S&H)':
            // HRA is 1000 if above 5 years of Salary Exp.
            if (salayExpereince > 5) {
                hra = 1000;
            }
            break;

        case 'Assistant Professor + Ph.D. (Engineering)':
        case 'Assistant Professor + Ph.D. (MBA, MCA and S&H)':
            // HRA is 2000 if above 5 years of Salary Exp.
            if (salayExpereince > 5) {
                hra = 2000;
            }
            break;

        case 'Associate Professor (Engineering)':
        case 'Associate Professor (MBA, MCA and S&H)':
            // HRA is 2000 if above 5 years of Salary Exp.
            if (salayExpereince > 5) {
                hra = 2000;
            }
            break;

        case 'Professor (Engineering)':
        case 'Professor (MBA, MCA and S&H)':
            // HRA is 3000 if above 5 years of Salary Exp.
            if (salayExpereince > 5) {
                hra = 3000;
            }
            break;

        // Add cases for other designations if needed

        default:
            console.error("Invalid designation for HRA calculation");
            break;
    }

    return hra;
}

          function calculateSalary() {
            var rHOD = parseFloat($("#rHOD").val()) || 0;
    var basicSalary = parseFloat($("#basicSalary").val()) || 0;
    var agp = parseFloat($("#agp").val()) || 0;
    var researchPapers = parseFloat($("#researchPapers").val()) || 0;
    var hra = parseFloat($("#hra").val()) || 0;
    var daPercentage = parseFloat('{{$employeeData->daPercentage}}') || 0;
    var salaryExp = parseFloat($("#salaryExp").val()) || 0;
    var phdAllowance = 0;
    var different = parseFloat($("#different").val()) || 0;
    var csd = parseFloat($("#csd").val()) || 0;

  
var apay = parseFloat($("#aPay").val()) || 0;

    var actualPay = parseFloat($("#actualPay").val()) || 0;

  
    const calculateSalaryExp = basicSalary * 0.015 * "{{$employee->salaryExp}}";
    $("#salaryExp").val(calculateSalaryExp.toFixed(2));
    console.log(calculateSalaryExp);

    console.log(hra.toFixed(2));
    $('#hra').val(hra.toFixed(2));


   console.log("daPercentage: " + daPercentage);
console.log("basicSalary: " + basicSalary);
var calculateDavalue = (daPercentage * basicSalary / 100);
console.log("Calculated daValue: " + calculateDavalue);

    $("#daValue").val(calculateDavalue.toFixed(2));

    

    // Your existing switch case for designation and other calculations
    var grossSalary = 0;

    switch (employeeData.designation) {
        case 'Assistant Professor (Engineering)':
            grossSalary = basicSalary + agp + (basicSalary * 0.03)  ;
            break;
        case 'Assistant Professor (MBA, MCA and S&H)':
            grossSalary = basicSalary + agp + (basicSalary * 0.03)  ;
            break;
        case 'Assistant Professor + Ph.D. doing (Engineering)':
            grossSalary = basicSalary + agp + (basicSalary * 0.03) + hra + (daPercentage * basicSalary / 100) ;
            break;
        case 'Assistant Professor + Ph.D. doing (MBA, MCA and S&H)':
            grossSalary = basicSalary + agp + (basicSalary * 0.03) + hra + (daPercentage * basicSalary / 100) ;
            break;
        case 'Assistant Professor + Ph.D. (Engineering)':
            phdAllowance = designation === 'Assistant Professor + Ph.D. (Engineering)' ? 10000 : 5000;
            grossSalary = basicSalary + agp + phdAllowance + (basicSalary * 0.03) + hra + (daPercentage * basicSalary / 100);
            break;
        case 'Assistant Professor + Ph.D. (MBA, MCA and S&H)':
            grossSalary = basicSalary + agp + 5000 + (basicSalary * 0.03) + hra + (daPercentage * basicSalary / 100) ;
            break;
        case 'Associate Professor (Engineering) + Research + HOD':
            grossSalary = basicSalary + agp + rHOD + salaryExp  + hra + (daPercentage * basicSalary / 100) ;
            break;
        case 'Associate Professor (MBA, MCA and S&H)':
            grossSalary = basicSalary + researchPapersNorms(researchPapers) + (basicSalary * 0.015) + hra + (daPercentage * basicSalary / 100) ;
            break;
        case 'Professor (Engineering)':
            grossSalary = basicSalary + agp + researchPapersNorms(researchPapers) + (basicSalary * 0.015) + hra + (daPercentage * basicSalary / 100);
            break;
        case 'Professor (MBA, MCA and S&H)':
            grossSalary = basicSalary + researchPapersNorms(researchPapers) + (basicSalary * 0.015) + hra + (daPercentage * basicSalary / 100);
            break;
        default:
            console.error("Invalid designation");
            return;
    }

var different = 0;
var result = grossSalary - (csd || 0); // Use 0 if csd is null or undefined

if (!csd) {
    $('#different').val('0.00');
} else {
    var result = grossSalary - csd;
    $("#different").val(result.toFixed(2));
    var different = result.toFixed(2);

// Calculate additional pay
var additionalPay = 0;

if (different <= 4000) {
    additionalPay = 4000 - different;
    $("#aPay").val(additionalPay.toFixed(2));
}





}

console.log("Result:", result);
console.log("Different:", different);




// Calculate Diff. / Actual


    if(!isNaN(grossSalary)) {
        $("#gSalary").val(grossSalary.toFixed(2));
      
          const calculateActualPay = grossSalary + apay;
    $("#actualPay").val(calculateActualPay.toFixed(2));

var diffActual = calculateActualPay - csd;
$("#diffAct").val(diffActual.toFixed(2));
console.log("Diff. / Actual:", diffActual.toFixed(2));

  


        console.log("Gross Salary: " + grossSalary.toFixed(2));
    } else {
        $("#gSalary").val("Calculation Error");
    }



}

// Research papers norms function
function researchPapersNorms(papers) {
    // Adjust this function based on your organization's norms for research papers
    return papers > 6 ? 2000 : 0;
}

// Call the calculateSalary function on page load
calculateSalary();

// Bind input events to recalculate on value changes
$("form input, form select").on("input change", function () {
    calculateSalary();
});
        });
</script>


</div>
@endsection