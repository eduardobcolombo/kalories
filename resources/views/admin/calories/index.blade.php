@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Calories</h3>

        <p>
            <a href="{{ route('admin.calories.create') }}" class="btn btn-default">New Calorie</a>
        </p>


        <table class="table">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Text</th>
                    <th>Calories</th>
                </tr>
            </thread>
            <tbody>

            @foreach($calories as $calorie)
            <tr>
                <td>{{$calorie->id}}</td>
                <td>{{$calorie->date}}</td>
                <td>{{$calorie->time}}</td>
                <td>{{$calorie->text}}</td>
                <td>{{$calorie->calories}}</td>
                <td>
                    <a href="{{route('admin.calories.edit',['id'=>$calorie->id])}}" class="btn btn-default btn-sm">
                        Update
                    </a>
                    <a href="{{route('admin.calories.destroy',['id'=>$calorie->id])}}" class="btn btn-default btn-sm">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

        {{ $calories->render() }}

    </div>



@endsection