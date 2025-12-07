<x-master title="create Publication">
    <h1>Create Publication</h1>
    @if ($errors->any())
        <x-alert type='danger'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 form-group">
            <label for="" class="form-label">Title</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" />
        </div >
        <div>
            <label for="" class="form-label">Description</label>
            <textarea type="text" name="body" class="form-control">{{ old('body') }}</textarea>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div class="mb-3 form-group">
            <button type="submit" class="btn btn-primary btn-block w-100">Ajouter Publication</button>
        </div>
    </form>
</x-master>
