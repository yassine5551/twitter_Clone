@auth()
<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{route('ideas.store')}}" method="post">
        @csrf

        <div class="mb-3">

            <textarea class="form-control" id="content" rows="3" name="content"></textarea>


            @error('content')
            <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth

@guest()
    <h3>Login to share ideas</h3>
    <textarea class="form-control" id="content" rows="3" name="content" placeholder="If you dont have an account you can register in few seconds"></textarea>
    

@endguest