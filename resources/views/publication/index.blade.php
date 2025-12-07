<x-master title="Publication">
        @foreach ($publications as $publication)
            <x-publications :canUpdate="auth()->user()?->id === $publication->profiles_id" :publication="$publication" />
        @endforeach

</x-master>
