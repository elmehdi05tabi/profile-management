<x-master title="profile">
    <div class="container-fluid ">
        <div class="row ">
            <div class="card p-5 text-center">
                <img class="card-img-top w-25 mx-auto circele" src="{{asset("storage/".$profile->image)}}" alt="Title" />
                <div class="card-body">
                    <h4 class="card-title">#{{$profile->id}} {{$profile->name}}</h4>
                    <p class="card-text">Email : <a href="mailto:{{$profile->email}}">{{$profile->email}}</a></p>
                    <p class="card-text">{{$profile->created_at->format('d-m-Y')}}</p>
                    <p class="card-text">{{$profile->bio}}</p>
                </div>
            </div>
            
        </div>
    </div>
</x-master>