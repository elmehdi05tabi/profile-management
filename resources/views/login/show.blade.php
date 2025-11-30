<x-master title="Se Connecter">
    <div class="alert alert-light w-50 m-auto">
        <h1>Autontification</h1>
        <form action="{{route('login')}}" method="POST">*
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="login" class="form-control" value="{{old('login')}}">
                @error('login') 
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Mot De Pass</label>
                <input type="password" name="passwrd" class="form-control">
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary"> Se Connecter</button>
            </div>
        </form>
    </div>

</x-master>
