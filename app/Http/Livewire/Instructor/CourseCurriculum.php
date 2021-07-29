<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class CourseCurriculum extends Component
{

    public $course, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount (Course $course){
        $this->course = $course;
        $this->section = new Section();
    }
    public function render()
    {
        return view('livewire.instructor.course-curriculum')->layout('layouts.instructor');
    }

    public function edit(Section $section)
    {
        $this->section= $section;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');
        $this->refreshInfom();
    }

    public function update()
    {
        $this->validate();

        $this->section->save();
        $this->section = new Section();

        $this->refreshInfom();
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->refreshInfom();
    }

    public function refreshInfom()
    {
        $this->course = Course::find($this->course->id);
    }
}