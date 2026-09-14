@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Add New Testimonial</h4>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
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
            <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <!-- Client Name -->
                    <div class="col-12 col-md-6">
                        <label for="client_name" class="form-label">Client Name *</label>
                        <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" required class="form-control @error('client_name') is-invalid @enderror" placeholder="e.g., John Doe">
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Designation (Role) -->
                    <div class="col-12 col-md-6">
                        <label for="designation" class="form-label">Role/Designation *</label>
                        <input type="text" id="designation" name="designation" value="{{ old('designation') }}" required class="form-control @error('designation') is-invalid @enderror" placeholder="e.g., Wedding Client, Brand Manager">
                        @error('designation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Testimonial Text -->
                    <div class="col-12">
                        <label for="testimonial_text" class="form-label">Testimonial *</label>
                        <textarea id="testimonial_text" name="testimonial_text" rows="6" required class="form-control @error('testimonial_text') is-invalid @enderror" placeholder="Write the testimonial...">{{ old('testimonial_text') }}</textarea>
                        @error('testimonial_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Approved -->
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" id="is_approved" name="is_approved" value="1" @if(old('is_approved', true)) checked @endif class="form-check-input">
                            <label class="form-check-label" for="is_approved">Approved</label>
                            <small class="form-text d-block">Check to make visible on website</small>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save Testimonial</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection