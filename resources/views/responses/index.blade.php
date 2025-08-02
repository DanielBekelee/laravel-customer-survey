@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Responses for "{{ $survey->title }}"</h1>

    @if($responses->isEmpty())
        <div class="alert alert-info">No responses yet.</div>
    @else
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Summary</h5>
                <p>Total responses: {{ $responses->count() }}</p>
                <p>Average rating: {{ number_format($responses->avg('rating'), 1) }}/5</p>
            </div>
        </div>

        <div class="list-group">
            @foreach($responses as $response)
                <div class="list-group-item mb-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Rating: {{ $response->rating }}/5</strong>
                            @if($response->comments)
                                <p class="mt-2">{{ $response->comments }}</p>
                            @endif
                        </div>
                        <small class="text-muted">{{ $response->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('surveys.show', $survey) }}" class="btn btn-secondary mt-3">Back to Survey</a>
</div>
@endsection