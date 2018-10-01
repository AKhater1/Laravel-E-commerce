@extends('layout.app')

          @section('content')
            <div class="content">
                <div class="title m-b-md">
                  

                    @if (count($products) > 0)

                    <div class="container">
                        <div class="row">
                          <h1>Products</h1>  
                          @foreach($products as $product)
                          <div class="col-md-4">
                            <div class="panel panel-primary">                       
                              <div class="panel-heading">
                                <h5 class="panel-title">{{$product->name}}</h5>    
                                
                              
                                <a class="pull-right btn btn-info" href="/products/{{$product->id}}/edit">Edit</a>  
                              
                                {!! Form::open(['action' => ['ProductsController@destroy',$product->id], 'method' => 'POST']) !!}
                                {{ Form::hidden('_method','DELETE') }}
                                {{ Form::submit('Delete',['class' => 'pull-right btn btn-danger']) }}
                                {!! Form::close() !!}
                               

                              </div>
                              <div class="panel-body">
                                  <p>{{$product->price}}</p>
                              <img src="/storage/uploads/{{$product->image}}" class="img-thumbnail" alt="{{$product->image}}">
                      
                                  <a class="pull-right btn btn-warning" href="/products/{{$product->id}}">More</a>
                              </div>                                    
                            </div>
                          </div>
                          @endforeach
                        
                      </div>
                      
                    </div>
                    

                      @else
                      @endif
                </div>
            </div>

            
            @endsection

