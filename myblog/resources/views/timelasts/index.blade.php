@extends('main')

@section('title','| All Timelast')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Time Last</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>

                </tr>

                </thead>

                <tbody>
                @foreach($timelasts as $timelast)
                    <tr>
                <th>{{$timelast->id}}</th>
                <td>{{$timelast->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       <div class="col-md-3">
           <div class="well">
               {!! Form::open(['route' => 'timelasts.store','method' =>'POST']) !!}

               <h2>New Timelast</h2>
               {{Form::label('name','Name:')}}
               {{Form::text('name',null,['class' =>'form-control'])}}
                {{Form::submit('create new timelast', ['class' =>'btn btn-primary btn-block'])}}
               {!! Form::close() !!}
           </div>
       </div>

    </div>


    @endsection