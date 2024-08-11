@extends('layouts.app')

@section('content')
<div class="container">
    @php
        $result = \App\Models\Result::where('user_id', auth()->id())->latest()->first();
    @endphp

    @if ($result)
        <h2>Your Result</h2>
        <p>Score: {{ $result->score }}</p>
        <p>{{ $result->has_diabetes ? 'You may have diabetes.' : 'You may not have diabetes.' }}</p>
    @else
        <p>No result found.</p>
    @endif
</div>
@endsection
