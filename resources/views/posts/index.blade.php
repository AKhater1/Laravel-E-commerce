@extends('layout.app')

          @section('content')
            <div class="content">
                <div class="title m-b-md">
                  

                    @if (count($posts) > 0)

                    <div class="container">
                        <div class="row">
                          <h1>Items</h1>  
                          @foreach($posts as $post)
                          <div class="col-md-4">
                            <div class="panel panel-primary">                       
                              <div class="panel-heading">
                                <h5 class="panel-title">{{$post->subject}}</h5>               
                              </div>
                              <div class="panel-body">
                                  <p>{{$post->firstname}} {{$post->lastname}}</p>
                              <img src="/storage/post_image/{{$post->post_image}}" class="img-thumbnail" alt="{{$post->post_image}}">
                                  <span class="label label-danger">Created at {{$post->created_at}}</span>
                                  <span class="label label-info">Created by {{$post->firstname}}</span>
                                  <a class="pull-right btn btn-warning" href="/posts/{{$post->id}}">More</a>
                              </div>                                    
                            </div>
                          </div>
                          @endforeach
                        
                      </div>
                      {{ $posts->links() }}
                    </div>
                    

                      @else
                      @endif
                </div>
            </div>

            
            @endsection

