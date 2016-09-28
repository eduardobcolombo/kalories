@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Updating calorie of: {{ $calorie->date }} {{ $calorie->time }} </h3>

        @include('errors._check')

        {!! Form::model($calorie, ['route'=>['admin.calories.update',$calorie->id]]) !!}

        @include('admin.calories._form')

        {!! Form::close() !!}

    </div>


@endsection