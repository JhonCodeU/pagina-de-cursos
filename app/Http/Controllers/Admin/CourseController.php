<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status',2)->paginate();
        return view('admin.courses.index', ['courses' => $courses]);
    }

    public function show(Course $course)
    {
        return $course;
        //return view('admin.courses.show', ['course' => $course]);
    }
}