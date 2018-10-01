@extends('layout.app')

            @section('content')

            {!! Form::open(['action' => 'ProductsController@store' , 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
            
            <div class="container">
                <div class="panel panel-primary">
                   <div class="panel-heading">
                        <h3 class="panel-title">Add product</h3>
                   </div>
                        <div class="panel-body">
                           <div class="form-group">
                           {{ Form::label('name', 'Name') }}
                           {{ Form::text('name','', ['class' => 'form-control','placeholder' => 'Name']) }}
                           </div>   
                           
                           <div class="form-group">
                           {{ Form::label('price', 'Price') }}
                           {{ Form::text('price','', ['class' => 'form-control','placeholder' => 'Price']) }}
                           </div>  
                           
                           <div class="form-group">
                            {{ Form::file('image', ['class' => 'form-control']) }}
                            </div>

                           <div class="form-group">
                           {{ Form::label('description', 'Description') }}
                           {{ Form::textarea('description','', ['class' => 'form-control','placeholder' => 'Description','id' => 'article-ckeditor']) }}
                           </div>

                           {{ Form::submit('Add',['class' => 'btn btn-primary btn-lg']) }}
                           
                        </div>
                </div>
            </div>

            

            {!! Form::close() !!}

            @endsection