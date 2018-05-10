@extends('layouts.app')

@section('page-title', trans('Add Departments'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create New Deartment
                <small>department details</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="">Departments</a></li>
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
                    <h3 class="panel-title">Add Department</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('department.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Department</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Department">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <button type="submit" class="btn btn-success">Add Department</button>
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
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop