
@extends('layouts.app')

@section('block')

<div class="container-fluid">

<form method="post" action="{{route('posts.update',[ 'post' => $post->id ])}}" enctype="multipart/form-data">

@csrf
@method('PUT')



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="{{$post['title']}}">
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description</label>
    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea">{{$post['description']}}</textarea>
  </div>

 


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image"  aria-describedby="emailHelp" >
    <br>
    <img src='{{asset("images/".$post->image)}}' width="100" height="100">
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="posted_by" value="{{$post['posted_by']}}" aria-describedby="emailHelp" value="">
  </div>


  <select class="form-select" name="track_id" aria-label="Default select example">
                @foreach($users as $us)
                    <option value="{{$us->id}}">{{$us->name}}</option>
                @endforeach

  </select>

            <br>


  
  <button type="submit" class="btn btn-primary">edit</button>
</form>

</div>


@endsection
