<x-master title="create profile">
    <h1>Create Profile</h1>
    @if ($errors->any())
        <x-alert type='danger'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mot De Pass</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirme Mot De Pass</label>
            <input type="password" name="password_confirmation" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea type="text" name="bio" class="form-control">{{ old('bio') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block w-100">Ajouter</button>
        </div>
    </form>
</x-master>
