@extends('layouts.app')

@section('page-title', trans('assigned-course'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                View Assigned Course
                <small>assigned courses</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">assigned courses</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')



    <div class="table-responsive" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Course Title</th>
            <th>Course Code</th>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course['course_title'] }}</td>
                    <td>{{ $course['course_code'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@stop
