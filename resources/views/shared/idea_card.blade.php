<div class="card">



    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{$idea->users->name}}
                        </a></h5>
                </div>
            </div>

          @if(auth()->id() === $idea['user_id'])
            <form action="{{route('idea.destroy',$idea['id'])}}" method="POST">
                @method('delete')
                @csrf
                <a href={{route("idea.show",$idea['id'])}}>show</a>
                <a href={{route("idea.edit",$idea['id'])}}>edit</a>

            <button>
              <span class="fs-6 text-danger">X</span>
            </button>
            </form>
          @else
          <a href={{route("idea.show",$idea['id'])}}>show</a>
          @endif
        </div>

    </div>

    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
        {{$idea["content"]}}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea["likes"]}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                  {{$idea['created_at']}}</span>
            </div>
        </div>
     @include('shared.comments-box')
    </div>

</div>
