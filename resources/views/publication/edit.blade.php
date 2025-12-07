<x-master title="Update Publication" >
    <form action="{{route('publications.update',$publication->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method("PUT")
         <div class="mb-3 form-group">
            <label for="" class="form-label">Title</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre',$publication->titre) }}" />
        </div >
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea type="text" name="body" class="form-control">{{ old('body',$publication->body) }}</textarea>
        </div>
        <div class="mb-3">
            @if($publication->image)
                <img src="{{asset("storage/".$publication->image)}}" width="200px" alt="">
            @endif
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