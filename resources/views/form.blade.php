<x-master title="form">
    <form action="{{route('form')}}" method="POST">
        <input type="date" class="form-control" name="input_field">
        <input type="submit" class="btn btn-primary">
    </form>
</x-master>