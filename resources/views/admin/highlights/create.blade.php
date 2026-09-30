@extends('admin.layouts.app')

@section('title', 'Add Highlight')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Add New Highlight</h4>
            <a href="{{ route('admin.highlights.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
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
            <form method="POST" action="{{ route('admin.highlights.store') }}" enctype="multipart/form-data" id="highlight-form">
                @csrf

                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="255"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g., Riya & Aarav Wedding Highlights">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="3" maxlength="5000"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Short description of the highlight...">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="tag" class="form-label">Tag *</label>
                        <select id="tag" name="tag" required class="form-control @error('tag') is-invalid @enderror">
                            <option value="">-- Select tag --</option>
                            @foreach($tags as $value => $label)
                                <option value="{{ $value }}" @selected(old('tag') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="type" class="form-label">Type *</label>
                        <select id="type" name="type" required class="form-control @error('type') is-invalid @enderror">
                            <option value="">-- Select type --</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" @selected(old('type') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="status" class="form-label">Status *</label>
                        <select id="status" name="status" required class="form-control @error('status') is-invalid @enderror">
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" @selected(old('status', 'active') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- IMAGE TYPE FIELD -->
                    <div class="col-12 field-image" style="display: none;">
                        <label for="media_file_image" class="form-label">Image File *</label>
                        <input type="file" id="media_file_image" accept="image/*"
                               class="form-control @error('media_file') is-invalid @enderror"
                               data-target="image">
                        <small class="form-text">Max {{ config('constants.media.max_image_size_kb', 2048) }}KB. Allowed: {{ config('constants.media.image_mimes') }}</small>
                        @error('media_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO TYPE: SOURCE TOGGLE -->
                    <div class="col-12 field-video" style="display: none;">
                        <label class="form-label">Video Source *</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="media_source" id="src_upload" value="upload"
                                       @checked(old('media_source', 'upload') === 'upload')>
                                <label class="form-check-label" for="src_upload">Upload Video File</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="media_source" id="src_link" value="link"
                                       @checked(old('media_source') === 'link')>
                                <label class="form-check-label" for="src_link">Video Link (URL)</label>
                            </div>
                        </div>
                    </div>

                    <!-- VIDEO: UPLOAD FILE -->
                    <div class="col-12 field-video-upload" style="display: none;">
                        <label for="media_file_video" class="form-label">Upload Video File *</label>
                        <input type="file" id="media_file_video" accept="video/*"
                               class="form-control @error('media_file') is-invalid @enderror"
                               data-target="video">
                        <small class="form-text">Max {{ round(config('constants.media.max_video_size_kb', 51200) / 1024, 1) }}MB. Allowed: {{ config('constants.media.video_mimes') }}</small>
                        @error('media_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO: LINK -->
                    <div class="col-12 field-video-link" style="display: none;">
                        <label for="media_url" class="form-label">Video URL *</label>
                        <input type="url" id="media_url" name="media_url" value="{{ old('media_url') }}" maxlength="2048"
                               class="form-control @error('media_url') is-invalid @enderror"
                               placeholder="https://youtube.com/watch?v=... or https://vimeo.com/...">
                        <small class="form-text">YouTube, Vimeo, or direct video URL</small>
                        @error('media_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO: THUMBNAIL (always required for video) -->
                    <div class="col-12 field-video" style="display: none;">
                        <label for="thumbnail_file" class="form-label">Thumbnail Image <span class="text-danger">*</span></label>
                        <input type="file" id="thumbnail_file" name="thumbnail_file" accept="image/*"
                               class="form-control @error('thumbnail_file') is-invalid @enderror">
                        <small class="form-text">Required for video. Max {{ config('constants.media.max_image_size_kb', 2048) }}KB.</small>
                        @error('thumbnail_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" maxlength="255"
                               class="form-control @error('location') is-invalid @enderror"
                               placeholder="e.g., Udaipur, Rajasthan">
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="sequence" class="form-label">Sequence</label>
                        <input type="number" id="sequence" name="sequence" value="{{ old('sequence') }}" min="0"
                               class="form-control @error('sequence') is-invalid @enderror"
                               placeholder="Auto assigned if blank">
                        @error('sequence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Single hidden real "media_file" input — populated at submit based on active type -->
                    <input type="file" name="media_file" id="media_file_real" style="display:none;">

                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.highlights.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save Highlight</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    (function () {
        const typeSelect       = document.getElementById('type');
        const imageFields      = document.querySelectorAll('.field-image');
        const videoFields      = document.querySelectorAll('.field-video');
        const videoUploadField = document.querySelector('.field-video-upload');
        const videoLinkField   = document.querySelector('.field-video-link');
        const srcUpload        = document.getElementById('src_upload');
        const srcLink          = document.getElementById('src_link');
        const imageFileInput   = document.getElementById('media_file_image');
        const videoFileInput   = document.getElementById('media_file_video');
        const mediaUrlInput    = document.getElementById('media_url');
        const thumbFile        = document.getElementById('thumbnail_file');
        const realMediaFile    = document.getElementById('media_file_real');
        const form             = document.getElementById('highlight-form');

        function toggleType() {
            const t = typeSelect.value;
            if (t === 'image') {
                imageFields.forEach(el => el.style.display = '');
                videoFields.forEach(el => el.style.display = 'none');
                videoUploadField.style.display = 'none';
                videoLinkField.style.display = 'none';
                imageFileInput.required = true;
                thumbFile.required = false;
                mediaUrlInput.required = false;
            } else if (t === 'video') {
                imageFields.forEach(el => el.style.display = 'none');
                videoFields.forEach(el => el.style.display = '');
                imageFileInput.required = false;
                thumbFile.required = true;
                toggleVideoSource();
            } else {
                imageFields.forEach(el => el.style.display = 'none');
                videoFields.forEach(el => el.style.display = 'none');
                videoUploadField.style.display = 'none';
                videoLinkField.style.display = 'none';
            }
        }

        function toggleVideoSource() {
            if (typeSelect.value !== 'video') return;
            if (srcUpload.checked) {
                videoUploadField.style.display = '';
                videoLinkField.style.display = 'none';
                videoFileInput.required = true;
                mediaUrlInput.required = false;
            } else {
                videoUploadField.style.display = 'none';
                videoLinkField.style.display = '';
                videoFileInput.required = false;
                mediaUrlInput.required = true;
            }
        }

        typeSelect.addEventListener('change', toggleType);
        srcUpload.addEventListener('change', toggleVideoSource);
        srcLink.addEventListener('change', toggleVideoSource);

        // On submit — copy the correct file input into the single "media_file" input the server expects.
        form.addEventListener('submit', function () {
            const t = typeSelect.value;
            let src = null;
            if (t === 'image' && imageFileInput.files.length) {
                src = imageFileInput;
            } else if (t === 'video' && srcUpload.checked && videoFileInput.files.length) {
                src = videoFileInput;
            }
            if (src) {
                const dt = new DataTransfer();
                dt.items.add(src.files[0]);
                realMediaFile.files = dt.files;
            }
        });

        toggleType();
    })();
</script>
@endsection
