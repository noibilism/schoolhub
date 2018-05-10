@extends('layouts.app')

@section('page-title', trans('assign-course'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Assign Course
                <small>assign courses</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">assign courses</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row content">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Assign Course</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('assign_course.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Department</label>
                                <div class="form-group">
                                    <select name="department" class="form-control" id="department">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Student</label>
                                <div class="form-group">
                                    <select name="student" class="form-control" id="student">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Courses</label>
                                <div class="form-group">
                                    <select class="form-control student_course" name="course_student[]" id='pre-selected-options' multiple='multiple'>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <button type="submit" class="btn btn-success update">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('assets/js/jquery.multi-select.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pre-selected-options').multiSelect();

            $('#department').on('change', function(e){
                $(".content").css({
                    opacity: 0.5
                });
                $('.update').attr("disabled", true);
                var department = $("#department").val();
                var url = '/assign-course/get-student';
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {department: department},
                    success: function(data){
                        if(data.error === 'error'){
                            $(".content").css({
                                opacity: 1
                            });
                            $('.update').attr("disabled", false);
                        }else{
                            $(".content").css({
                                opacity: 1
                            });
                            $('.update').attr("disabled", false);

                            $('#student').empty();

                            $('.student_course').empty();

                            $('#student').append(' Please choose one');
                            if(data.courses.length != 0){
                                $.each(data.courses, function(index, title){
                                    $(".student_course").append('' + '<option value ="'+ title.id + '"  > ' + title.course_title + ' ' + title.course_code + '  </option>');
                                    $(".student_course").multiSelect('refresh');
                                });
                            }else{
                                $(".student_course").multiSelect('refresh');
                            }

                            $.each(data.users, function(index, title){
                                // console.log(title);
                                $("#student").append('' + '<option value ="'+ title.id + '"  > ' + title.first_name + ' ' + title.last_name + '  </option>');
                            });

                        }

                    }
                });
            });
        });
    </script>
@stop

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/multi-select.css') }}">
@stop
