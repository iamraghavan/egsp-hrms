<?php

// In Employee.php model
// app\Models\Employee.php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'temp_id',
        'facultyName',
        'ENGINEERINGCOURSES',
        'dateOfJoining',
        'egspecExp',
        'otherCollegeExp',
        'totalExp',
        'salaryExp',
        'designation',
        'ugCompleted',
        'pgCompleted',
        'phdStatus',
        // Add any other fillable columns
    ];

    // Add any additional methods or relationships here
}
