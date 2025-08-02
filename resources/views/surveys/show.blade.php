@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $survey->title }}</h2>
            <p class="card-text">{{ $survey->description }}</p>
            
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Created: {{ $survey->created_at->format('M d, Y') }}</small>
                
                <div>
                    <a href="{{ route('responses.index', $survey) }}" class="btn btn-primary">
                        View Responses ({{ $survey->responses->count() }})
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Share Survey</div>
        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="survey-link" 
                       value="{{ route('responses.create', $survey) }}" readonly>
                <button class="btn btn-outline-secondary" onclick="copyLink()">Copy Link</button>
            </div>
            <p class="text-muted">Share this link with your customers to collect feedback.</p>
        </div>
    </div>
</div>

<script>
function copyLink() {
    const linkInput = document.getElementById('survey-link');
    linkInput.select();
    document.execCommand('copy');
    alert('Link copied to clipboard!');
}
</script>
@endsection