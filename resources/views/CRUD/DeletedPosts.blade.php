
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

@foreach($DelePosts as $post)
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
        <a href="{{route('DeletedPost.restor', $post)}}" class='btn btn-warning'> Restor </a> 
        <form style="display:inline" action="{{route('posts.destroy', $post->id)}}"  method="post">
          @csrf
          @method('delete')
        <input type="submit" class="btn btn-danger" value="Delete">
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

{{ $DelePosts->links() }}



</div> 

<!-- @dump($DelePosts) -->

@endsection