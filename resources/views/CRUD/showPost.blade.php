






@extends('layouts.app')

@section('block')


<div class="card text-bg-light mb-3" style="max-width: 20rem;">
  <div class="card-header">Post info</div>
  <div class="card-body">
    <h5 class="card-title">title</h5>
    <p class="card-text">{{$post['title']}}</p>


    <h5 class="card-title">description</h5>
    <p class="card-text">{{$post['description']}}</p>

    <h5 class="card-title">User</h5>
    <p class="card-text">{{$post['posted_by']}}</p>


    <h5 class="card-title">Created At</h5>
    <p class="card-text">{{$post['created_at']}}</p>

    <h5 class="card-title">cereated by</h5>
    <p class="card-text">{{$post->user->name}}</p>

    <h5 class="card-title">image</h5>
    <p class="card-text"><img src='{{asset("images/".$post->image)}}' width="100" height="100"></p>




  
  </div>
</div>





@dump($post)

@endsection


<!-- ->isoFormat('dddd D of MMMM YYYY   hh:mm:ss A') -->

