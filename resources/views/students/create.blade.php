@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create New Student
                <small>student details</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="">students</a></li>
                        <li class="active">create</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Student</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('student.store') }}" id="student-form" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">First Name</label>
                                <div class="form-group">
                                    <input type="text" name="f_name" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level">Last Name</label>
                                <div class="form-group">
                                    <input type="text" name="l_name" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Phone Number</label>
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level">Email</label>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Password</label>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level">Re-Password</label>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Department</label>
                                <div class="form-group">
                                    <select name="department" class="form-control" id="">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">DOB</label>
                                    <div class='input-group date'>
                                        <input type='text' name="birthday" id='birthday' class="form-control" />
                                        <span class="input-group-addon" style="cursor: default;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Address</label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level">Country</label>
                                <div class="form-group">
                                    <select name="country" class="form-control" id="">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_code }}">{{ $country->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <button type="submit" class="btn btn-success">Add Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>



@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\CreateStudentRequest', '#student-form') !!}
@stop