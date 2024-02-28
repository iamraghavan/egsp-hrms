<?php

// database/migrations/{timestamp}_create_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('temp_id');
            $table->string('facultyName');
            $table->string('ENGINEERINGCOURSES');
            $table->date('dateOfJoining');
            $table->string('egspecExp');
            $table->string('otherCollegeExp');
            $table->string('totalExp');
            $table->string('salaryExp');
            $table->string('designation');
            $table->string('ugCompleted');
            $table->string('pgCompleted');
            $table->string('phdStatus')->nullable();
            $table->integer('researchPapers')->nullable();
            // Add any other columns you may need
            $table->string('designationID');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
