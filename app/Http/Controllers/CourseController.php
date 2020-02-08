<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\CourseStudent;

class CourseController extends Controller
{
    public function getAllCourses(){

        $courses = Course :: paginate(30);

        return response()->json($courses);
    }

    public function addNewCourse(Request $request){

        $courses = new Course();
        $courses->name = $request['name'];
        $courses->short_description = $request['short_description'];
        $courses->description = $request['description']->nullable();
        $courses->price = $request['price'];
        $courses->course_time = $request['course_time'];
        $courses->start_at = $request['start_at'];
        $courses->end_at = $request['end_at'];
        $courses->teacher_id = $request['teacher_id'];
        $courses->schedule = $request['schedule'];
        $courses->link = $request['link'];
        $courses->level_id = $request['level_id'];
        $courses->save();

        return response()->json([

            'status_code' => 201,
            'message' => 'Course created sucessfuly',
            'data' => $courses
        ]);

    }

    public function registerNewCourseStudent(Request $request){

        $courseStudents = new CourseStudent();
        $courseStudents->course_id = $request['course_id'];
        $courseStudents->student_id = $request['student_id'];
        $courseStudents->save();

        return response()->json([

            'status_code' => 201,
            'message' => 'Student added to Course sucessfuly',
            'data' => $courseStudents
        ]);
    }
}

