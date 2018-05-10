@extends('layouts.app')

@section('page-title', trans('course'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Courses
                <small>available courses</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">courses</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row tab-search">
        <div class="col-md-2">
            <a href="{{ route('course.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                Add Course
            </a>
        </div>
    </div>


    <div class="table-responsive" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Course Title</th>
            <th>Course Code</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->course_title }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->department->name }}</td>
                    <td><a href="{{ route('course.edit', ['id' => $course->id]) }}" class="btn btn-primary btn-xs">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $course->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @foreach($courses as $course)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Department</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete {{ $course->course_title }} ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-danger">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop
