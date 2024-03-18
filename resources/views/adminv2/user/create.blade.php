@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
    {!! Form::label('name', __("admin/{$folder}.form_name")) !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_name_placeholder"),
    ]) !!}
    {!! Form::label('email', __("admin/{$folder}.form_email")) !!}
    {!! Form::email('email', null, [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_email_placeholder"),
    ]) !!}
    {!! Form::label('password', __("admin/{$folder}.form_password")) !!}
    {!! Form::password('password', [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_password_placeholder"),
    ]) !!}
    {!! Form::label('password_confirmation', __("admin/{$folder}.form_password_confirmation")) !!}
    {!! Form::password('password_confirmation', [
        'class' => 'form-control',
        'placeholder' => __("admin/{$folder}.form_password_confirmation_placeholder"),
    ]) !!}
    {!! Form::label('role', __("admin/{$folder}.form_role")) !!}
    {!! Form::select('role', $roles, 'default', ['class' => 'form-control']) !!}
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection