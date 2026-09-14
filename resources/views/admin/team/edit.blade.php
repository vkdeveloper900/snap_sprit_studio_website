@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Update Team Member - {{ $teamMember->name }} </h4>
            <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
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
            <form method="POST" action="{{ route('admin.team.update', $teamMember->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Name -->
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Designation -->
                    <div class="col-12 col-md-6">
                        <label for="designation" class="form-label">Designation *</label>
                        <input type="text" id="designation" name="designation" value="{{ old('designation', $teamMember->designation) }}" required class="form-control @error('designation') is-invalid @enderror">
                        @error('designation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Avatar -->
                    <div class="col-12 col-md-6">
                        <label for="avatar" class="form-label">Avatar Image</label>
                        @if($teamMember->avatar_url)
                            <div class="mb-2">
                                <img src="{{ $teamMember->avatar_url }}" alt="{{ $teamMember->name }}" style="max-width: 150px; height: auto; border-radius: 6px;">
                            </div>
                        @endif
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="form-control @error('avatar') is-invalid @enderror">
                        <small class="form-text">Max 2MB. JPEG, PNG, JPG, GIF</small>
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bio (Full Width) -->
                    <div class="col-12">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea id="bio" name="bio" rows="6" class="form-control @error('bio') is-invalid @enderror" placeholder="Tell us about this team member...">{{ old('bio', $teamMember->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" id="is_active" name="is_active" value="1" @if(old('is_active', $teamMember->is_active)) checked @endif class="form-check-input">
                            <label class="form-check-label" for="is_active">Active Status</label>
                            <small class="form-text d-block">Check to make visible on website</small>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
