@extends('layouts.app')

@section('content')
<div style="margin-top:5em;">
<a href="/post" class="btn btn-default"> Go Back </a>
    <h1> {{$post->title}} </h1>
    
        <div class="card card-body bg-light">
            {{$post->body}}
     
        </div>

        <hr>
<small> Created at {{$post->created_at}} </small>
  

</div>
@endsection