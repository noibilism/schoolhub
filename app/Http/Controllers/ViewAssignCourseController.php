<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;
use Vanguard\Course;

class ViewAssignCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = [];
        $user_id = \Auth::user()->id;
        $course_assigned = \DB::select("SELECT * from course_students where user_id = '$user_id'");

        foreach ($course_assigned as $course_as){
            $course_info = \DB::select("SELECT * FROM courses where id = '$course_as->course_id'");
            $courses[] = [
                'id' => $course_info[0]->id,
                'course_title' => $course_info[0]->course_title,
                'course_code' => $course_info[0]->course_code,
            ];
        }

        return view('view-assigned-course.index',compact('courses'));
    }


}
