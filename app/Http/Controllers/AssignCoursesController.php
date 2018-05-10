<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;
use Vanguard\Course;
use Vanguard\Department;
use Vanguard\User;

class AssignCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where('status', 1)->get();
        return view('assign-courses.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getStudent()
    {
        $department_id = request()->department;
        $users = User::where('department_id', $department_id)->get();

        $courses = Course::where('department_id', $department_id)->get();

        if(!$users || !$courses){
            return response()->json(['error' => 'error']);
        }

        if($users && $courses){
            return response()->json(['users' => $users, 'courses' => $courses]);
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department' => 'required',
            'student' => 'required',
            'course_student' => 'required',
        ]);

        $course_st = [];

        foreach ($request->course_student as $co){
            $course_st[] = [
                'course_id' => $co,
                'user_id' => $request->student,
            ];
        }

        $asign_course = \DB::table('course_students')->insert($course_st);

        if($asign_course){
            return redirect()->back()->withSuccess('Courses assigned successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
