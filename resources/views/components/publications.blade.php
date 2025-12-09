<div class="p-2 border border-gray-200 my-2 mx-auto w-50 bg-light">
    <div class="card p-2  d-flex my-3 align-items-center justify-content-center gap-3">
        <img class="rounded-circle" height="50px" width="50px" src="{{ asset('storage/' . $publication->profile->image) }}"
            alt="">
        <h3>{{ $publication->profile->name }}</h3>
        <a class="stretched-link" href="{{ route('profiles.show', $publication->profile->id) }}"></a>
    </div>
    <hr>
    @auth
        <div class="forms">
            @can('update', $publication)
                <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-sm  btn-outline-success">Modifier</a>
            @endcan
            @can('delete',$publication)
                <form method="POST" class="mt-2" action="{{ route('publications.destroy', $publication->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('voulez vous suprimer cette publication')"
                        class="btn btn-outline-danger btn-sm">Suprimer</button>
                </form>
            @endcan
        </div>
    @endauth
    <h1 class="">
        {{ $publication->titre }}
    </h1>
    <p class="text-gray-600 leading-relaxed mb-4">
        {{ $publication->body }}
    </p>
    @if ($publication->image)
        <img src="{{ asset('storage/' . $publication->image) }}" alt="image" class="img-fluid img-rounde">
    @endif

</div>
