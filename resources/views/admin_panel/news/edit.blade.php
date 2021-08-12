@extends('layouts.siedbar')

@section('content')
<!-- Content Wrapper. Contains pmassege_positive content -->
    <div class="content-wrapper">
      <!-- Content Header (Pmassege_positive header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/news')}}">Post</a></li>
                <li class="breadcrumb-item active">Edit Post</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    
      <!-- /.content-header -->
      <div class="container">
          <form method="post" enctype="multipart/form-data" action="{{ url('news/update/'.$id)}}" autocomplete="on">
                 @csrf
                 @method('put')
                 <h5 class="title">{{ __('Edit Post') }}</h5> <a href = "{{url('/news')}}" class="btn btn-outline-secondary">Back</a>

                 <div class="row">
                         <label class="col-sm-2 col-form-label">{{ __('Post Image') }}</label>
                         <div class="col-sm-7">
                             <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                 @if($post->image != null)

                                     <img src="{{asset($post->image)}}" width="80%" height="auto">
                                     <br>
                                     <a href="{{url('/news/destroy-image/'.$id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete Image</a>
                                     <input name="image" type="file">
                                         
                                 @else
                                      <input name="image" type="file">
                                 @endif
                             </div>
                         </div>
                 </div>

                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                             <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('title') }}"
                                            value="{{ $post->title }}" required="true" aria-required="true" />
                         </div>
                     </div>
                 </div>

                    <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Published') }}</label>
                          <div class="col-sm-7">
                             <div class="form-group{{ $errors->has('categories') ? ' has-danger' : '' }}">
                                <select class="form-control" name="status"> 
                                     @if($post->status  == 'published') 
                                         <option value="{{$post->status }}">{{$post->status}}</option>
                                         <option value="no published">no published</option>
                                     @else
                                         <option value="{{$post->status }}">{{$post->status }}</option>
                                         <option value="published"> published</option>
                                     @endif   
                                </select>       
                             </div>
                         </div>
                     </div>

                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('Post') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('post') ? ' has-danger' : '' }}">
                             <textarea name="post">{{ $post->body }}</textarea>
                             <script>
                                 CKEDITOR.replace( 'post' );
                             </script>
                         </div>
                     </div>
                 </div>
                     
                 <button type="submit" class="btn btn-outline-secondary pull-right">{{ _('Update Post') }}</button>
                     <div class="clearfix"></div>              
         </form>
     </div>
    </div>
@endsection