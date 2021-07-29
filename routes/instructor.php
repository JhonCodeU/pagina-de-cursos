<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CourseCurriculum;
use Illuminate\Support\Facades\Route;


Route::resource('courses', CourseController::class)->names('courses');

Route::redirect('','instructor/courses');

Route::get('courses/{course}/curriculum',CourseCurriculum::class)->name('courses.curriculum');