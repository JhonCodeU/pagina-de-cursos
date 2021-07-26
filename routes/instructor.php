<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;


Route::resource('courses', CourseController::class)->names('courses');

Route::redirect('','instructor/courses');