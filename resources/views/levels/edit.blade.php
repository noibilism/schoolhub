@extends('layouts.app')

@section('page-title', trans('Add Levels'))

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Level
                <small>level details</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="">Levels</a></li>
                        <li class="active">Edit</li>
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
                    <h3 class="panel-title">Edit Level : {{ $level->name }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('level.update', ['id' => $level->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level">Level</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ $level->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1">
                                <button type="submit" class="btn btn-success">Update Level</button>
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