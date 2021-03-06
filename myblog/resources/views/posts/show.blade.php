@extends('main')

@section('title','| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
    <h1>{{ $post->title }}</h1>

    <p class="lead">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                 <p>{{$post->category->name}}</p>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Timelast:</dt>
                    <p>{{$post->timelast->name}}</p>
                </dl>


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
                        {!! Html::linkRoute('posts.edit','edit',array($post->id),
                        array('class'=>'btn btn-primary btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open((['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])) !!}

                        {{--{!! Html::linkRoute('posts.destroy','delete',array($post->id),--}}
                            {{--array('class'=>'btn btn-danger btn-block')) !!}--}}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endsection