<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;
use Vanguard\Country;
use Vanguard\Department;
use Vanguard\Http\Requests\CreateStudentRequest;
use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\User;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('department_id', '<>', '')->get();
        return view('students.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CountryRepository $countryRepository)
    {
        $departments = Department::where('status', 1)->get();
        $countries = Country::all();
        return view('students.create', compact('departments', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $user = User::create([
            'first_name' => $request->f_name,
            'last_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone_number,
            'password' => $request->password,
            'department_id' => $request->department,
            'country_id' => $request->country,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'status' => 'Active'
        ]);

        $role = \DB::insert("INSERT into role_user (user_id, role_id) VALUES ('$user->id', 3)");

        return redirect()->route('student.index')->withSuccess('Student created successfully');
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
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->withSuccess('Student deleted successfully');
    }
}
