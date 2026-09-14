@extends('admin.layouts.app')

@section('title', 'Add Client')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Add New Client</h4>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
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
            <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <!-- Name -->
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Client Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="col-12 col-md-6">
                        <label for="category" class="form-label">Category *</label>
                        <input type="text" id="category" name="category" value="{{ old('category') }}" required class="form-control @error('category') is-invalid @enderror" placeholder="e.g., Brand Films">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Logo -->
                    <div class="col-12 col-md-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" id="logo" name="logo" accept="image/*" class="form-control @error('logo') is-invalid @enderror">
                        <small class="form-text">Max 2MB. JPEG, PNG, JPG, GIF, SVG</small>
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- URL -->
                    <div class="col-12 col-md-6">
                        <label for="url" class="form-label">URL (Optional)</label>
                        <input type="url" id="url" name="url" value="{{ old('url') }}" class="form-control @error('url') is-invalid @enderror" placeholder="https://example.com">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" id="is_active" name="is_active" value="1" @if(old('is_active', true)) checked @endif class="form-check-input">
                            <label class="form-check-label" for="is_active">Active Status</label>
                            <small class="form-text d-block">Check to make visible on website</small>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save Client</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection