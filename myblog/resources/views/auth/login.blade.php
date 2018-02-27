@extends('main')

@section('title', '| Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open() !!}
        {{Form::label('email','Email:')}}
        {{Form::email('email',null,['class' => 'form-control'])}}


            {{Form::label('password','Password:')}}
            {{Form::password('password',['class' => 'form-control'])}}

            <br>
            {{Form::checkbox('remember')}}{{Form::label('remember',"Remember Me")}}

            <br>
             {{Form::submit('Login',['class' =>'btn btn-success btn-block'])}}

            <a href="{{url('password/reset')}}" class="btn btn-default">Forget My Password</a><a href="{{url('/auth/register')}}"  class="btn btn-default">Register</a>

    </div>
            </div>


            {!! Form::close() !!}
        </div>
    </div>


    @endsection