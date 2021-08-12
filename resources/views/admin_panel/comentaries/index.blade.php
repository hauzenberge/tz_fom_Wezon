@extends('layouts.siedbar')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Henewer (Page henewer) -->
      <div class="content-henewer">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Comments <a href="{{ url('/comentaries/add') }}" class="btn btn-outline-secondary">Add Coment</a></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-henewer -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <table class="table">
                 <thenew>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">User Name</th>
                      <th scope="col">From Post</th>
                      <th scope="col">Status</th>
                      <th scope="col">Text</th>
                      <th scope="col">Created</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                 </thenew>
                 <tbody>
                    @if (count($comentaries) === 0)
                        <tr><td>I don't have any records!</td></tr>
                    @else
                     @foreach ($comentaries as $new)
                            <tr>                                    
                                <th scope="row">{{$new->id}}</th>
                                <td><h2>{{ $new->user_name }}</h2></td>
                                <td><a href="{{url('/comentaries/from-post/'.$new->news_id)}}">{{App\News::Name($new->news_id)}}</a></td>
                                <td>{{ $new->status }}</td>
                                <td>{!! substr($new->body, 0, 150) !!}</td>
                                
                                 <td> {{$new->created_at}} </td>

                                <td><a href="{{url('/comentaries/edit/'.$new->id)}}">Edit</a></td>
                                <td><a href="{{url('/comentaries/delete/'.$new->id)}}">Delete</a></td>
                            </tr>
                     @endforeach                      
                    @endif 
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection   