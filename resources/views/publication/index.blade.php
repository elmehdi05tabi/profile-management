<x-master title="Publication">
        @foreach ($publications as $publication)
            <x-publications  :publication="$publication" />
        @endforeach

</x-master>
