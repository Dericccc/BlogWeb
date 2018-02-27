
@extends('main')

{{--@section('stylesheets')--}}
    {{--<link rel="stylesheet" type="text/css" href="styles.css">--}}
    {{--@endsection--}}
@section('title', '| Homepage')

@section('content')
 <div class="row">
     <div class="col-md-12">

         <div class="jumbotron">
             <h1 class="display-4">Welcome to Rocketfox Ltd</h1>
             {{--<p class="lead">Thank you so much for visiting. This is my test website--}}
             {{--built with Laravel.Please read my popular post!</p>--}}
             {{--<hr class="my-4">--}}
             {{--<p>It uses utility classes for typography and spacing to space con--}}
                 {{--tent out within the larger container.</p>--}}
             {{--<p class="lead">--}}
                 {{--<a class="btn btn-primary btn-lg" href="#" role="button"></a>--}}
             {{--</p>--}}
         </div>
     </div>
 </div>

 <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

              <div class="post">

                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body,0,300)}}{{strlen($post->body) > 20 ? "..." : ""}}</p>
                   </p><a href="{{url('blog',$post->slug)}}" class="btn btn-primary">Read More</a>

              </div>
         <hr>
            @endforeach


        </div>


    {{--<div class="row">--}}
        {{--<div class="col-md-8">--}}
       {{--<div class="post">--}}
           {{--<h3>Post Title</h3>--}}
           {{--<p>jdlksa  jlkjsalkjdkla sjldjlsajlkjdlkhkfjdshfkjhd--}}
               {{--sjkfhsd kjhfj k,ashdk jsahkja  shfkjhdsjkfhds--}}
           {{--</p><a href="#" class="btn btn-primary">Read More</a>--}}
       {{--</div>--}}
            {{--<hr>--}}
            {{--<div class="post">--}}
                {{--<h3>Post Title</h3>--}}
                {{--<p>jdlksa  jlkjsalkjdkla sjldjlsajlkjdlkhkfjdshfkjhd--}}
                    {{--sjkfhsd kjhfj k,ashdk jsahkja  shfkjhdsjkfhds--}}
                {{--</p><a href="#" class="btn btn-primary">Read More</a>--}}
            {{--</div>--}}
            {{--<hr>--}}
            {{--<div class="post">--}}
                {{--<h3>Post Title</h3>--}}
                {{--<p>jdlksa  jlkjsalkjdkla sjldjlsajlkjdlkhkfjdshfkjhd--}}
                    {{--sjkfhsd kjhfj k,ashdk jsahkja  shfkjhdsjkfhds--}}
                {{--</p><a href="#" class="btn btn-primary">Read More</a>--}}
            {{--</div>--}}
            {{--<hr>--}}
            {{--<div class="post">--}}
                {{--<h3>Post Title</h3>--}}
                {{--<p>jdlksa  jlkjsalkjdkla sjldjlsajlkjdlkhkfjdshfkjhd--}}
                    {{--sjkfhsd kjhfj k,ashdk jsahkja  shfkjhdsjkfhds--}}
                {{--</p><a href="#" class="btn btn-primary">Read More</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>
@endsection

{{--@section('scripts')--}}
    {{--<script>--}}
        {{--confirm('I loaded up some js');--}}
    {{--</script>--}}
    {{--@endsection--}}