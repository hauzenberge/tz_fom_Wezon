@extends('layouts.app')

@section('content')
 
<div class="row">
    <div class="col-12 ">       
        
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
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
        
     </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Коментарии записи:</h2>
                <form method="coment" enctype="multipart/form-data" action="{{ url('/comentaries/store/'.$post->id)}}" autocomplete="on">
                 @csrf
                 @method('put')
                 <h5 class="user_name">{{ __('Add Comment') }}</h5>

                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('User Name') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('user_name') ? ' has-danger' : '' }}">
                            @guest
                                <input class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" id="input-user_name" type="text" placeholder="{{ __('user_name') }}"
                                            value="" required="true" aria-required="true" />
                            @else
                                <input class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" id="input-user_name" type="text" placeholder="{{ __('user_name') }}"
                                            value="{{ Auth::user()->name }}" required="true" aria-required="true" />
                            @endguest
                             
                         </div>
                     </div>
                 </div>
                 <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    <br/>
                <script type="text/javascript">
                  var onloadCallback = function() {
                    alert("grecaptcha is ready!");
                  };
                </script>
                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('Coment') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('coment') ? ' has-danger' : '' }}">
                             <textarea name="coment"></textarea>
                             <script>
                                 CKEDITOR.replace( 'coment' );
                             </script>
                         </div>
                     </div>
                 </div>
                     
                 <button type="submit" class="btn btn-outline-secondary pull-right">{{ _('Add coment') }}</button>
                     <div class="clearfix"></div>              
         </form>                
            </div>
            <div class="card-body">
                @if(count($coments) > 0)
                        @foreach($coments as $coment)   
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{$coment->user_name}}: </h2>
                                        <p>
                                            {!! $coment->body !!}
                                        </p>
                                </div>
                            </div>
                        @endforeach
                @endif
            </div>
        </div>
        
    </div>
</div>
@endsection