<x-master title="Proiles">
    <h1>Profiles</h1>
    <div class="row ">
        @foreach ($profiles as $profile )
        <x-profile-card :profile="$profile"/>
        @endforeach
    </div>
    {{$profiles->links()}}
</x-master>