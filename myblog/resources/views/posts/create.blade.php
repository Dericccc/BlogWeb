@extends('main')
@section('title','| Create New Post')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
    @endsection
@section('content')

    <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <h1>Create New Project</h1>
           <hr>
           {!! Form::open(array('route'=>'posts.store','data-parsley-validate' => '')) !!}
           {{Form::label('title','Title:')}}
           {{Form::text('title',null,array('class'=>'form-control','required' => ''))}}

           {{Form::label('slug','Slug:')}}
           {{Form::text('slug',null,array('class'=>'form-control','required','minlength'=>'5',
           'maxlength'=>'255'))}}

           {{Form::label('category_id',"Category:")}}
           <select class="form-control" name="category_id">



               @foreach($categories as $category)
               <option value='{{$category->id}}'>{{$category->name}}</option>

                   @endforeach

           </select>

           {{Form::label('timelast_id',"Time Last:")}}
           <select class="form-control" name="timelast_id">

               @foreach($timelasts as $timelast)
                   <option value='{{$timelast->id}}'>{{$timelast->name}}</option>

               @endforeach

           </select>

           {{Form::label('body',"Post Body")}}
           {{Form::textarea('body',null,array('class'=>'form-control','required' => ''))}}

           {{Form::submit('Create Project',array('class'=>'btn btn-success btn-block'
           ,'style'=>'margin-top:20px;'))}}
           {!! Form::close() !!}

    </div>
    </div>


@endsection


@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
    @endsection