<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RejectCourse;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status',2)->paginate();
        return view('admin.courses.index', ['courses' => $courses]);
    }

    public function show(Course $course)
    {

        $this->authorize('revision', $course);

        return view('admin.courses.show', ['course' => $course]);
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso que no este completo');
        }
        $course->status = 3;
        $course->save();

        //Enviamos correo electrónico
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se publico con exito');
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation', ['course' => $course]);
    }

    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required'
        ]);
        
        $course->observation()->create($request->all());

        $course->status = 1;
        $course->save();

        //Enviamos correo electrónico
        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha rechazado con exito');

    }
}