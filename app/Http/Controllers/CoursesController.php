<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;
use Vanguard\Course;
use Vanguard\Department;
use Vanguard\Http\Requests\CreateCourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('status', 1)->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('status', 1)->get();
        return view('courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        $course = Course::create([
            'course_title' => $request->course_title,
            'course_code' => $request->course_code,
            'department_id' => $request->department
        ]);

        return redirect()->route('course.index')->withSuccess('Course created successfully');
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
        $course = Course::find($id);
        $departments = Department::where('status', 1)->get();
        return view('courses.edit', compact('course', 'departments'));
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
        $course = Course::find($id);
        if($course->course_title !== $request->name || $course->course_code !== $request->course_code || $course->department_id !== $request->department){
            if($course->course_title !== $request->name){
                $this->validate($request, [
                    'name' => 'required|unique:courses'
                ]);
                $course->course_title = $request->name;
                $course->save();
            }

            if($course->course_code !== $request->course_code){
                $this->validate($request, [
                    'course_code' => 'required|unique:courses',
                ]);
                $course->course_code = $request->course_code;
                $course->save();
            }
            if($course->department_id !== $request->department){
                $this->validate($request, [
                    'department' => 'required'
                ]);
                $course->department_id = $request->department;
                $course->save();
            }

            return redirect()->route('course.index')->withSuccess('Course updated successfully');
        }

        return redirect()->route('course.index')->withErrors('No changes were made');
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
