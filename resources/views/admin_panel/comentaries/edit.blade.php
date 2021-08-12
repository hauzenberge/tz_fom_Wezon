@extends('layouts.siedbar')

@section('content')
<!-- Content Wrapper. Contains pmassege_positive content -->
    <div class="content-wrapper">
      <!-- Content Header (Pmassege_positive header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit coment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/news')}}">coment</a></li>
                <li class="breadcrumb-item active">Edit coment</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    
      <!-- /.content-header -->
      <div class="container">
          <form method="coment" enctype="multipart/form-data" action="{{ url('comentaries/update/'.$id)}}" autocomplete="on">
                 @csrf
                 @method('put')
                 <h5 class="user_name">{{ __('Edit Comment') }}</h5> <a href = "{{url('/news')}}" class="btn btn-outline-secondary">Back</a>

                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('User Name') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('user_name') ? ' has-danger' : '' }}">
                             <input class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" id="input-user_name" type="text" placeholder="{{ __('user_name') }}"
                                            value="{{ $coment->user_name }}" required="true" aria-required="true" />
                         </div>
                     </div>
                 </div>

                    <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Published') }}</label>
                          <div class="col-sm-7">
                             <div class="form-group{{ $errors->has('categories') ? ' has-danger' : '' }}">
                                <select class="form-control" name="status"> 
                                     @if($coment->status  == 'published') 
                                         <option value="{{$coment->status }}">{{$coment->status}}</option>
                                         <option value="no published">no published</option>
                                     @else
                                         <option value="{{$coment->status }}">{{$coment->status }}</option>
                                         <option value="published"> published</option>
                                     @endif   
                                </select>       
                             </div>
                         </div>
                     </div>

                 <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('Coment') }}</label>
                     <div class="col-sm-7">
                         <div class="form-group{{ $errors->has('coment') ? ' has-danger' : '' }}">
                             <textarea name="coment">{{ $coment->body }}</textarea>
                             <script>
                                 CKEDITOR.replace( 'coment' );
                             </script>
                         </div>
                     </div>
                 </div>
                     
                 <button type="submit" class="btn btn-outline-secondary pull-right">{{ _('Update coment') }}</button>
                     <div class="clearfix"></div>              
         </form>
     </div>
    </div>
@endsection