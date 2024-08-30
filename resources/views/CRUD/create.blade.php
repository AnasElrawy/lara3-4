
@extends('layouts.app')

@section('block')

<div class="container-fluid">


<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">

@csrf


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="{{old('title')}}">
  </div>

  @error('titel')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description</label>
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description" >{{old('description')}}</textarea>
  </div>

  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp" >

  </div>

  <!-- <select class="form-select mb-4" name="user" aria-label="Default select example">
    @{{-- foreach($users as $user)
      <option >{{$user['posted_by']}} </option>
    @endforeach--}}
  </select> -->

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="posted_by" aria-describedby="emailHelp" value="">
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@endsection
