@extends('layouts.app')

@section('content')
 
<div class="row">
    @foreach($posts as $post)
        <div class="col-12 col-md-4">       
            
                <div class="card">
                    <div class="card-header">
                      
                      @if($post->image != null)
                         <img src="{{asset($post->image)}}" width="300px">
                      @endif
                      
                       <h3>{{ $post->title }}</h3>
                            <br>
                            <strong>Published:</strong> {{ date('M j, Y', strtotime($post->created_at)) }}
                            <br>
                      
                    </div>

                    <div class="card-body">
                        <p>
                            {!! substr($post->body, 0, 150) !!}
                            <a href="{{url('/post/'.$post->id)}}">...Learn More...</a>
                        </p>
                    </div>
                </div>
            
        </div>
    @endforeach
    <div class="col-12">
        
    </div>
</div>
@endsection