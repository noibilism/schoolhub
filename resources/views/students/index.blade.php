@extends('layouts.app')

@section('page-title', trans('students'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Students
                <small>available students</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">students</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row tab-search">
        <div class="col-md-2">
            <a href="{{ route('student.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                Add Student
            </a>
        </div>
    </div>


    <div class="table-responsive" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->department->name }}</td>
                    <td><a href="{{ route('level.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $user->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @foreach($users as $user)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Level</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete {{ $user->first_name.' '.$user->last_name }} ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ route('student.delete', ['id' => $user->id]) }}" class="btn btn-danger">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop
