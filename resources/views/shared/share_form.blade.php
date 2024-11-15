@auth



<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{route('idea.create')}}" method="POST">
        @csrf
    <div class="mb-3">
        <textarea class="form-control" name="idea-content" id="idea" rows="3"></textarea>
        @error('idea-content')
            <span class="fs-6 text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="">
        <button class="btn btn-dark"> Share </button>
    </div>
</form>
</div>
@endauth

@guest
<h4>Login To Share yours ideas </h4>
@endguest
