@extends('layouts.app')

@section('page-title', trans('departments'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Departments
                <small>available departments</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">departments</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row tab-search">
        <div class="col-md-2">
            <a href="{{ route('department.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                Add Department
            </a>
        </div>
    </div>


    <div class="table-responsive" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->name }}</td>
                    <td><a href="{{ route('department.edit', ['id' => $department->id]) }}" class="btn btn-primary btn-xs">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $department->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @foreach($departments as $department)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Department</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure you want to delete {{ $department->name }} ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ route('department.delete', ['id' => $department->id]) }}" class="btn btn-danger">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop
