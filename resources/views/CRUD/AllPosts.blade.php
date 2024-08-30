
<?php
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;


use Illuminate\Pagination\Paginator;
// Paginator::useBootstrapFive();
Paginator::useBootstrapFour();



?>


@extends('layouts.app')

@section('block')


@if(session('overNum'))
        <div class="alert alert-danger">
            {{ session('overNum') }}
        </div>
@endif


<div class="container-fluid">

<a href="{{route('posts.create')}}" class='btn btn-success'> Create </a> 



<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">posted by</th>
      <th scope="col">image</th>
      <!-- <th scope="col">created_at</th> -->
      <th scope="col">created_at</th>
      <th scope="col">slug</th>

      <!-- <th scope="col">created_at</th> -->
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

@foreach($posts as $post)
    <tr> 
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->posted_by}}</td>
      <td><img src='{{asset("images/".$post->image)}}' width="100" height="100">
      <!-- <td>{{--$user['created_at']--}}</td> -->
      <!-- <td>{{--$user['created_at']->isoFormat('dddd D');--}}</td> -->
      <td>{{$post->created_at}}</td>
      <td>{{$post->slug}}</td>
      <!-- <td>{{--$user['created_at']->toDateTimeString();--}}</td> -->
    </td>

      
      
      <td>
        <a href="{{route('posts.show', $post)}}" class='btn btn-info'> Show </a> 
        <a href="{{route('posts.edit', $post->id)}}" class='btn btn-primary'> edit </a>

<!-- 
        <form style="display:inline" action="{{route('posts.destroy', $post->id)}}"  method="post">
          @csrf
          @method('delete')
        <input type="submit" class="btn btn-danger" value="Delete">
        </form> -->

        <form style="display:inline" action="{{route('posts.destroy', $post->id)}}"  method="post">
          @csrf
          @method('delete')

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
delete
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        are you shoer to delete post that id is  {{$post->id}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">no</button>
        <input type="submit" class="btn btn-danger" value="yes">

      </div>
    </div>
  </div>
</div>



        </form>
    </td>
              
                </tr>

              @endforeach
                    

    <!-- <tr>
    
      <td>Mark</td>
      <td>Otto</td>
      <td>
        <button type="button" class="btn btn-info">view</button>
        <button type="button" class="btn btn-primary">edit</button>
        <button type="button" class="btn btn-danger">delete</button>
      </td>
    </tr> -->
   

  </tbody>
</table>

{{ $posts->links() }}



</div> 

<!-- @dump($posts) -->

@endsection