@extends('layout.app')

            @section('content')

            {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) !!}
            
            <div class="container">
                <div class="panel panel-primary">
                   <div class="panel-heading">
                        <h3 class="panel-title">Edit Post</h3>
                   </div>
                        <div class="panel-body">
                           <div class="form-group">
                           {{ Form::label('subject', 'Subject') }}
                           {{ Form::text('subject',$post->subject, ['class' => 'form-control','placeholder' => 'Subject']) }}
                           </div>   
                           
                           <div class="form-group">
                           {{ Form::label('firstname', 'First name') }}
                           {{ Form::text('firstname',$post->firstname, ['class' => 'form-control','placeholder' => 'First name']) }}
                           </div>  
                           
                           <div class="form-group">
                           {{ Form::label('lastname', 'Last name') }}
                           {{ Form::text('lastname',$post->lastname, ['class' => 'form-control','placeholder' => 'Last name']) }}
                           </div>

                           <div class="form-group">
                           {{ Form::label('body', 'Description') }}
                           {{ Form::textarea('body',$post->body, ['class' => 'form-control','placeholder' => 'Description','id' => 'article-ckeditor']) }}
                           </div>


                           {{ Form::hidden('_method','PUT') }}
                           {{ Form::submit('Update',['class' => 'btn btn-primary btn-lg']) }}
                           
                        </div>
                </div>
            </div>

            {!! Form::close() !!}

            @endsection