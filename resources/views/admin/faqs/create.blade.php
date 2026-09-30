@extends('admin.layouts.app')

@section('title', 'Add FAQ')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Add New FAQ</h4>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger m-3">
                <strong>Error:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('admin.faqs.store') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-12">
                        <label for="question" class="form-label">Question *</label>
                        <input type="text" id="question" name="question" value="{{ old('question') }}" required maxlength="500"
                               class="form-control @error('question') is-invalid @enderror"
                               placeholder="e.g., Do you travel outside Ahmedabad?">
                        @error('question')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label for="answer" class="form-label">Answer *</label>
                        <textarea id="answer" name="answer" rows="5" required maxlength="5000"
                                  class="form-control @error('answer') is-invalid @enderror"
                                  placeholder="Detailed answer to the question...">{{ old('answer') }}</textarea>
                        @error('answer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="category" class="form-label">Category (Optional)</label>
                        <input type="text" id="category" name="category" value="{{ old('category') }}" maxlength="100"
                               class="form-control @error('category') is-invalid @enderror"
                               placeholder="e.g., General, Booking, Pricing">
                        <small class="form-text">For grouping FAQs (optional)</small>
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="order" class="form-label">Order (Optional)</label>
                        <input type="number" id="order" name="order" value="{{ old('order') }}" min="0"
                               class="form-control @error('order') is-invalid @enderror"
                               placeholder="Auto assigned if blank">
                        @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" id="is_active" name="is_active" value="1"
                                   @if(old('is_active', true)) checked @endif class="form-check-input">
                            <label class="form-check-label" for="is_active">Active Status</label>
                            <small class="form-text d-block">Check to make visible on website</small>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save FAQ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
