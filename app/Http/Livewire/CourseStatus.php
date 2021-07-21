<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course, $current, $index, $previous, $next;

    //se activa una vez
    public function mount(Course $course){

        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;

                //index
                $this->index = $course->lessons->search($lesson);

                if ($this->index != 0) {
                    //previous
                    $this->previous = $course->lessons[$this->index - 1];
                }else{
                    $this->previous = $course->lessons[$this->index + 1];
                }

                //next
                $this->next = $course->lessons[$this->index + 1];

                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id);

        if ($this->index == 0) {
            $this->previous = null;
        }else{
            $this->previous = $this->course->lessons[$this->index - 1];
        }

        if ($this->index == $this->course->lessons->count() - 1) {
            $this->next == null;
        }else{
            $this->next = $this->course->lessons[$this->index + 1];
        }

    }
}
