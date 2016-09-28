@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>New Calorie</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.calories.store']) !!}

        @include('admin.calories._form')

        {!! Form::close() !!}

    </div>



@endsection