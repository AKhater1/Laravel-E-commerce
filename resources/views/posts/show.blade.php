@extends('layout.app')

            @section('content')
            <div class="content">
                <div class="title m-b-md">
                    <div class="container">
                      <div class="panel panel-info">                       
                        <div class="panel-heading">
                          <h5 class="panel-title">{{$post->firstname}} {{$post->lastname}}  
                            <a class="pull-right btn btn-info" href="/posts/{{$post->id}}/edit">Edit</a>  
                          
                            {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            {{ Form::submit('Delete',['class' => 'pull-right btn btn-danger btn-lg']) }}
                            {!! Form::close() !!}
                          </h5>
                        </div>
                        <div class="panel-body">
                            <h2>{{$post->subject}}</h2>
                            <p>{!!$post->body!!}</p>
                            <span class="label label-danger">Created at {{$post->created_at}}
                            <a class="pull-right btn btn-warning" href="/posts">back</a>
                        </div>                                    
                      </div>
                    </div> 
                </div>
            </div>
            @endsection