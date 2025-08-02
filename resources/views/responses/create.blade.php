@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $survey->title }}</div>

                <div class="card-body">
                    <p class="mb-4">{{ $survey->description }}</p>

                    <form method="POST" action="{{ route('responses.store', $survey) }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">How would you rate your experience?</label>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" required>
                                        <label class="form-check-label" for="rating{{ $i }}">{{ $i }} star</label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="comments" class="form-label">Additional comments (optional)</label>
                            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection