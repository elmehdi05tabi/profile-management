<div class="col-sm-4 my-5">
    <div class="card">
        <img class="card-img-top" src="https://picsum.photos/100/60" alt="Card image cap" />
        <div class="card-body">
            <h4 class="card-title">{{$profile->name}}</h4>
            <p class="card-text">{{Str::limit($profile->bio,50)}}</p>
            <a  class="stretched-link" href="{{route('profile.show',$profile->id)}}"></a>
        </div>
        <div class="card-foot border-top bg-light px-3 py-3 d-flex justify-content-center gap-3" style="z-index: 10">
            <form action="{{route('profile.destroy',$profile->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger " >Supprimer</button>
            </form>
            <form action="{{route('profile.edit',$profile->id)}}"  method="GET">
                <button class="btn btn-primary me-5">
                    Modifier
                </button>
            </form>
        </div>
    </div>
</div>