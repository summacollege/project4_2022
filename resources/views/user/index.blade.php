@extends('layouts.dashboard')

@section('content')
    <div class="text-xl">Personen</div>
    @canany(['manage activiteiten', 'admin'])
        @foreach ($users as $user)
            <div>
                <a href="{{ route('users.edit', $user) }}">
                    {{ $user->name }} ({{ $user->id }})
                </a>
            </div>
        @endforeach
    @else
        <p>Je hebt geen rechten om deze pagina te bekijken</p>
    @endcan
    </div>
@endsection
