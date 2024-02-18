<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class FacultySelection extends Component
{
    public $selectedCourse;
    public $facultyNames = [];

    public function render()
    {
        // Fetch faculty names based on the selected course
        if ($this->selectedCourse) {
            $this->facultyNames = Employee::where('ENGINEERINGCOURSES', $this->selectedCourse)
                ->pluck('facultyName')
                ->unique()
                ->values()
                ->toArray();
        }

        return view('livewire.faculty-selection');
    }
}

