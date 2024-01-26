<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            {{-- adding button to delete shared ideas --}}
            <div>
                        <form method="post" action="{{route('ideas.destroy',$idea->id)}}">
                            @csrf
                            @method('delete')
                            <a class=" mx-2 btn btn-secondary" href="{{route('ideas.show',$idea->id)}}">View</a>
                            <a class="mx-2"type="" class="mt-2 btn btn-primary" href="{{route('ideas.edit',$idea->id)}}">Edit</a>
                            <button type="" class="mt-2 btn btn-danger">X</button>
                        
                        </form>
            </div>
        </div>
    </div>
    
        
    
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{route('ideas.update',$idea->id)}}" method="post">
                @csrf
                @method('put')

            <div class="mb-3">
                <textarea class="form-control" id="content" rows="3" name="content">{{$idea->content}}</textarea>
                @error('content')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        </form>
        @else
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at}}</span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
    
</div>