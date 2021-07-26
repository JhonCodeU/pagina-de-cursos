<?php

namespace App\Http\Livewire\instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $course = Course::where('title', 'LIKE', '%'. $this->search . '%')
                ->where('user_id', auth()->user()->id)
                ->latest('id')
                ->paginate(8);

        return view('livewire.instructor.courses-index', ['courses' => $course]);
    }

    public function clearPage(){
        $this->reset('page');
    }
}
