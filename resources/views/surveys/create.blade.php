@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Survey</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('surveys.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Survey Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Survey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection