@extends('layout.app')

            @section('content')
            <div class="content">
                <div class="title m-b-md">
                    <div class="container">
                      <div class="panel panel-info">                       
                        <div class="panel-heading">
                          <h5 class="panel-title">{{$post->firstname}} {{$post->lastname}}
                            
                            @if(!Auth::guest())
                            @if(Auth::user()->id == $post->user_id)
                            <a class="pull-right btn btn-info" href="/posts/{{$post->id}}/edit">Edit</a>  
                          
                            {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            {{ Form::submit('Delete',['class' => 'pull-right btn btn-danger btn-lg']) }}
                            {!! Form::close() !!}
                            @endif
                            @endif
                          </h5>
                        </div>
                        <div class="panel-body">
                            <h2>{{$post->subject}}</h2>
                            <img src="/storage/post_image/{{$post->post_image}}" class="img-thumbnail" alt="{{$post->post_image}}">
                            <p>{!!$post->body!!}</p>
                            <span class="label label-danger">Created at {{$post->created_at}}</span>
                            <span class="label label-info">Created by {{$post->firstname}}</span>

                            <a class="pull-right btn btn-warning" href="/posts">back</a>
                        </div>                                    
                      </div>
                    </div> 
                </div>
            </div>
            @endsection