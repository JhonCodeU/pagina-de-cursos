<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    //se activa una vez
    public function mount(Course $course){

        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;

                break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled',$course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Metodos

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id);
    }

    public function completed()
    {
        if ($this->current->completed) {
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Crear registration
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $count = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $count++;
            }
        }

        $advanced = ($count * 100)/($this->course->count());

        return round($advanced, 2);
    }
}
