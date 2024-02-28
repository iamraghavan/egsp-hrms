<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('norms', function (Blueprint $table) {
            $table->integer('designationID')->primary();
            $table->string('title', 255);
            $table->integer('basicSalary', 10, 2);
            $table->integer('agp', 10, 2);
            $table->integer('researchPapers');
            $table->integer('hra');
            $table->integer('daPercentage', 5, 2);
            $table->integer('incrementPercentage', 5, 2);
            $table->integer('phdAmount', 10, 2);
        });

        // Insert data into the table
        DB::table('norms')->insert([
            ['designationID' => 1, 'title' => 'Assistant Professor (Engineering)', 'basicSalary' => 15600, 'agp' => 6000, 'researchPapers' => 0, 'hra' => 0, 'daPercentage' => 0, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 2, 'title' => 'Assistant Professor (MBA, MCA and S&H)', 'basicSalary' => 15600, 'agp' => 3000, 'researchPapers' => 0, 'hra' => 0, 'daPercentage' => 0, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 3, 'title' => 'Assistant Professor + Ph.D. doing (Engineering)', 'basicSalary' => 15600, 'agp' => 6000, 'researchPapers' => 0, 'hra' => 1000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 4, 'title' => 'Assistant Professor + Ph.D. doing (MBA, MCA and S&H)', 'basicSalary' => 15600, 'agp' => 3000, 'researchPapers' => 0, 'hra' => 1000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 5, 'title' => 'Assistant Professor + Ph.D. (Engineering)', 'basicSalary' => 15600, 'agp' => 7000, 'researchPapers' => 10000, 'hra' => 2000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 6, 'title' => 'Assistant Professor + Ph.D. (MBA, MCA and S&H)', 'basicSalary' => 15600, 'agp' => 3000, 'researchPapers' => 5000, 'hra' => 0, 'daPercentage' => 0, 'incrementPercentage' => 0.03, 'phdAmount' => 0],
            ['designationID' => 7, 'title' => 'Associate Professor (Engineering)  + Research + HOD ', 'basicSalary' => 37400, 'agp' => 8000, 'researchPapers' => 6, 'hra' => 2000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.015, 'phdAmount' => 0],
            ['designationID' => 8, 'title' => 'Associate Professor (MBA, MCA and S&H)', 'basicSalary' => 37400, 'agp' => 0, 'researchPapers' => 6, 'hra' => 2000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.015, 'phdAmount' => 0],
            ['designationID' => 9, 'title' => 'Professor (Engineering)', 'basicSalary' => 37400, 'agp' => 10000, 'researchPapers' => 10, 'hra' => 3000, 'daPercentage' => 0.05, 'incrementPercentage' => 0.015, 'phdAmount' => 0],
            ['designationID' => 10, 'title' => 'Professor (MBA, MCA and S&H)', 'basicSalary' => 37400, 'agp' => 0, 'researchPapers' => 10, 'hra' => 0, 'daPercentage' => 0, 'incrementPercentage' => 0.015, 'phdAmount' => 0],
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('norms');
    }
};
