@extends('layouts.app')

@section('page-title', trans('Edit Course'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                 Edit Course
                <small>course details</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="">Courses</a></li>
                        <li class="active">edit</li>
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
                    <h3 class="panel-title">Edit Course : {{ $course->course_title }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('course.update', ['id' => $course->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Title</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ $course->course_title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Code</label>
                                <div class="form-group">
                                    <input type="text" name="course_code" class="form-control" value="{{ $course->course_code }}">
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
                                            <option value="{{ $department->id }}"
                                            @if($course->department_id === $department->id)
                                                selected
                                            @endif
                                            >{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <button type="submit" class="btn btn-success">Update Course</button>
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
    {!! JsValidator::formRequest('Vanguard\Http\Requests\CreateCourseRequest', '#user-form') !!}
@stop