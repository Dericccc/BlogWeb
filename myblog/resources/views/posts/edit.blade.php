@extends('main')

@section('title', ' | Edit Blog Post')

@section('content')

    <div class="row">
     {!! Form::model($post,['route'=>['posts.update',$post->id] , 'method'=>'PUT']) !!}
        <div class="col-md-12">
            {{Form::label('title','Title:')}}
          {{Form::text('title',null,["class"=>'form-control input-lg'])}}

            {{Form::label('slug','Slug:')}}
            {{Form::text('slug',null,["class"=>'form-control'])}}

            {{Form::label('category_id','Category:',['class'=>'form-spacing-top'])}}
            {{Form::select('category_id',$categories,null,['class' =>'form-control'])}}

            {{Form::label('timelast_id','Timelast:',['class'=>'form-spacing-top'])}}
            {{Form::select('timelast_id',$timelasts,null,['class' =>'form-control'])}}

           {{Form::label('body',"Body:",['class'=>'form-spacing-top'])}}
          {{Form::textarea('body',null,['class'=>'form-control'])}}

        </div>
        <div class="col-md-12">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id),
                        array('class'=>'btn btn-danger btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
                        {{--{!! Html::linkRoute('posts.update','Save Changing',array($post->id),--}}
                            {{--array()) !!}--}}
                    </div>
                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>

    @stop

