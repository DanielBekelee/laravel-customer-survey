@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Surveys</h1>
        <a href="{{ route('surveys.create') }}" class="btn btn-primary">Create New Survey</a>
    </div>

    @if($surveys->isEmpty())
        <div class="alert alert-info">You haven't created any surveys yet.</div>
    @else
        <div class="list-group">
            @foreach($surveys as $survey)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $survey->title }}</h5>
                        <p class="mb-1">{{ $survey->description }}</p>
                        <small>Created: {{ $survey->created_at->diffForHumans() }}</small>
                    </div>
                    <div>
                        <a href="{{ route('surveys.show', $survey) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('surveys.destroy', $survey) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection