@extends('layout.master')
@section('title',"dashboard")


@section('content')


<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{route('idea.update',$idea->id)}}" method="POST">
        @csrf
        @method('put')
    <div class="mb-3">
        <textarea class="form-control" name="idea-content" id="idea" rows="3">{{$idea->content}}
        </textarea>
        @error('idea-content')
            <span class="fs-6 text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="">
        <button class="btn btn-dark"> Share </button>
    </div>
</form>
</div>
@endsection
