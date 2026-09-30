@extends('admin.layouts.app')

@section('title', 'Edit Highlight')

@section('content')
    @php
        $existingIsVideoLink   = $highlight->type === 'video' && $highlight->is_external_media;
        $existingIsVideoUpload = $highlight->type === 'video' && !$highlight->is_external_media && $highlight->media_url;
        $defaultVideoSource    = old('media_source', $existingIsVideoLink ? 'link' : 'upload');
    @endphp

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Edit Highlight</h4>
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
            <form method="POST" action="{{ route('admin.highlights.update', $highlight->id) }}" enctype="multipart/form-data" id="highlight-form">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $highlight->title) }}" required maxlength="255"
                               class="form-control @error('title') is-invalid @enderror">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="3" maxlength="5000"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $highlight->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="tag" class="form-label">Tag *</label>
                        <select id="tag" name="tag" required class="form-control @error('tag') is-invalid @enderror">
                            <option value="">-- Select tag --</option>
                            @foreach($tags as $value => $label)
                                <option value="{{ $value }}" @selected(old('tag', $highlight->tag) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="type" class="form-label">Type *</label>
                        <select id="type" name="type" required class="form-control @error('type') is-invalid @enderror">
                            <option value="">-- Select type --</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" @selected(old('type', $highlight->type) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="status" class="form-label">Status *</label>
                        <select id="status" name="status" required class="form-control @error('status') is-invalid @enderror">
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" @selected(old('status', $highlight->status) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- IMAGE TYPE FIELD -->
                    <div class="col-12 field-image" style="display: none;">
                        <label for="media_file_image" class="form-label">Image File</label>
                        @if($highlight->type === 'image' && $highlight->media_full_url)
                            <div style="margin-bottom: 12px;">
                                <img src="{{ $highlight->media_full_url }}" alt="{{ $highlight->title }}"
                                     style="width: 200px; height: 120px; border-radius: 6px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" id="media_file_image" accept="image/*" data-target="image"
                               class="form-control @error('media_file') is-invalid @enderror">
                        <small class="form-text">Leave blank to keep existing. Max {{ config('constants.media.max_image_size_kb', 2048) }}KB.</small>
                        @error('media_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO TYPE: SOURCE TOGGLE -->
                    <div class="col-12 field-video" style="display: none;">
                        <label class="form-label">Video Source *</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="media_source" id="src_upload" value="upload"
                                       @checked($defaultVideoSource === 'upload')>
                                <label class="form-check-label" for="src_upload">Upload Video File</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="media_source" id="src_link" value="link"
                                       @checked($defaultVideoSource === 'link')>
                                <label class="form-check-label" for="src_link">Video Link (URL)</label>
                            </div>
                        </div>
                    </div>

                    <!-- VIDEO: UPLOAD FILE -->
                    <div class="col-12 field-video-upload" style="display: none;">
                        <label for="media_file_video" class="form-label">Upload Video File</label>
                        @if($existingIsVideoUpload)
                            <div style="margin-bottom: 12px; padding: 8px 12px; background: rgba(74,222,128,0.1); border: 1px solid #4ade80; border-radius: 6px; color: #4ade80; font-size: 12px;">
                                ✓ Current: <a href="{{ $highlight->media_full_url }}" target="_blank" style="color:#4ade80; text-decoration:underline;">{{ basename($highlight->media_url) }}</a>
                            </div>
                        @endif
                        <input type="file" id="media_file_video" accept="video/*" data-target="video"
                               class="form-control @error('media_file') is-invalid @enderror">
                        <small class="form-text">Leave blank to keep existing. Max {{ round(config('constants.media.max_video_size_kb', 51200) / 1024, 1) }}MB.</small>
                        @error('media_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO: LINK -->
                    <div class="col-12 field-video-link" style="display: none;">
                        <label for="media_url" class="form-label">Video URL *</label>
                        <input type="url" id="media_url" name="media_url"
                               value="{{ old('media_url', $existingIsVideoLink ? $highlight->media_url : '') }}"
                               maxlength="2048"
                               class="form-control @error('media_url') is-invalid @enderror"
                               placeholder="https://youtube.com/watch?v=...">
                        <small class="form-text">YouTube, Vimeo, or direct video URL</small>
                        @error('media_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- VIDEO: THUMBNAIL -->
                    <div class="col-12 field-video" style="display: none;">
                        <label for="thumbnail_file" class="form-label">Thumbnail Image @if(!$highlight->thumbnail_url)<span class="text-danger">*</span>@endif</label>
                        @if($highlight->thumbnail_full_url)
                            <div style="margin-bottom: 12px;">
                                <img src="{{ $highlight->thumbnail_full_url }}" alt="Thumbnail"
                                     style="width: 200px; height: 120px; border-radius: 6px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" id="thumbnail_file" name="thumbnail_file" accept="image/*"
                               class="form-control @error('thumbnail_file') is-invalid @enderror">
                        <small class="form-text">Leave blank to keep existing. Required for video.</small>
                        @error('thumbnail_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $highlight->location) }}" maxlength="255"
                               class="form-control @error('location') is-invalid @enderror">
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="sequence" class="form-label">Sequence</label>
                        <input type="number" id="sequence" name="sequence" value="{{ old('sequence', $highlight->sequence) }}" min="0"
                               class="form-control @error('sequence') is-invalid @enderror">
                        @error('sequence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <input type="file" name="media_file" id="media_file_real" style="display:none;">

                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.highlights.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Update Highlight</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- =============================================== --}}
    {{-- MEDIA GALLERY — multiple images/videos           --}}
    {{-- =============================================== --}}
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white mb-0">Media Gallery <small class="text-muted" style="font-size:12px;font-weight:400;">— extra images/videos for detail page</small></h4>
            <span class="text-muted" style="font-size:12px;">{{ $highlight->medias->count() }} item(s)</span>
        </div>

        <div class="card-body">
            {{-- Existing media grid --}}
            <div id="media-grid" class="row g-3 mb-4">
                @forelse($highlight->medias as $m)
                    <div class="col-6 col-md-3" data-id="{{ $m->id }}">
                        <div style="position: relative; border-radius: 8px; overflow: hidden; background: rgba(255,255,255,0.05); aspect-ratio: 1/1;">
                            @if($m->type === 'video')
                                @if($m->thumbnail_full_url)
                                    <img src="{{ $m->thumbnail_full_url }}" alt="Video thumbnail" style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <video src="{{ $m->media_full_url }}" style="width:100%;height:100%;object-fit:cover;" muted></video>
                                @endif
                                <span style="position:absolute;top:8px;left:8px;background:rgba(0,0,0,0.7);color:#fff;padding:3px 8px;border-radius:4px;font-size:10px;font-weight:600;">▶ VIDEO</span>
                            @else
                                <img src="{{ $m->media_full_url }}" alt="Media" style="width:100%;height:100%;object-fit:cover;">
                            @endif

                            <button type="button" class="media-delete-btn"
                                    data-url="{{ route('admin.highlights.media.destroy', ['id' => $highlight->id, 'mediaId' => $m->id]) }}"
                                    style="position:absolute;top:8px;right:8px;background:rgba(255,69,69,0.9);color:#fff;border:none;width:28px;height:28px;border-radius:50%;cursor:pointer;font-weight:700;">
                                ×
                            </button>
                            <div style="position:absolute;bottom:0;left:0;right:0;padding:6px 10px;background:linear-gradient(transparent,rgba(0,0,0,0.7));color:#fff;font-size:11px;">
                                #{{ $m->order }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted text-center mb-0" style="padding: 32px 0;">No media added yet. Upload below.</p>
                    </div>
                @endforelse
            </div>

            <hr style="border-color: rgba(255,255,255,0.1);">

            {{-- Upload form --}}
            <form method="POST" action="{{ route('admin.highlights.media.store', $highlight->id) }}" enctype="multipart/form-data" id="media-upload-form">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Upload Multiple Images / Videos</label>
                        <input type="file" name="media_files[]" id="media_files" multiple
                               accept="image/*,video/*"
                               class="form-control">
                        <small class="form-text">
                            Images: {{ config('constants.media.image_mimes') }} (max {{ config('constants.media.max_image_size_kb', 2048) }}KB) —
                            Videos: {{ config('constants.media.video_mimes') }} (max {{ round(config('constants.media.max_video_size_kb', 51200)/1024, 1) }}MB)
                        </small>
                    </div>

                    <div class="col-12" id="thumbnail-inputs-wrap" style="display:none;">
                        <label class="form-label">Thumbnails for Videos (optional)</label>
                        <div id="thumbnail-inputs" class="d-flex flex-column gap-2"></div>
                        <small class="form-text">Provide a thumbnail per uploaded video for better previews.</small>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Upload to Gallery</button>
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

        const hasExistingImage      = @json($highlight->type === 'image' && !empty($highlight->media_url));
        const hasExistingVideoFile  = @json($existingIsVideoUpload);
        const hasExistingVideoLink  = @json($existingIsVideoLink);
        const hasExistingThumb      = @json(!empty($highlight->thumbnail_url));

        function toggleType() {
            const t = typeSelect.value;
            if (t === 'image') {
                imageFields.forEach(el => el.style.display = '');
                videoFields.forEach(el => el.style.display = 'none');
                videoUploadField.style.display = 'none';
                videoLinkField.style.display = 'none';
                imageFileInput.required = !hasExistingImage;
                thumbFile.required = false;
                mediaUrlInput.required = false;
            } else if (t === 'video') {
                imageFields.forEach(el => el.style.display = 'none');
                videoFields.forEach(el => el.style.display = '');
                imageFileInput.required = false;
                thumbFile.required = !hasExistingThumb;
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
                videoFileInput.required = !hasExistingVideoFile;
                mediaUrlInput.required = false;
            } else {
                videoUploadField.style.display = 'none';
                videoLinkField.style.display = '';
                videoFileInput.required = false;
                mediaUrlInput.required = !hasExistingVideoLink;
            }
        }

        typeSelect.addEventListener('change', toggleType);
        srcUpload.addEventListener('change', toggleVideoSource);
        srcLink.addEventListener('change', toggleVideoSource);

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

    /* =========== MEDIA GALLERY LOGIC =========== */
    (function () {
        // Delete media buttons
        document.querySelectorAll('.media-delete-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                Swal.fire({
                    title: 'Delete this media?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d4af37',
                    cancelButtonColor: '#ff4545',
                    confirmButtonText: 'Yes, delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;
                        form.innerHTML = `@csrf @method('DELETE')`;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });

        // Detect video files -> show thumbnail inputs
        const mediaFilesInput   = document.getElementById('media_files');
        const thumbnailsWrap    = document.getElementById('thumbnail-inputs-wrap');
        const thumbnailsInputs  = document.getElementById('thumbnail-inputs');
        const videoExtRegex     = /\.(mp4|mov|avi|wmv|webm)$/i;

        if (mediaFilesInput) {
            mediaFilesInput.addEventListener('change', function () {
                thumbnailsInputs.innerHTML = '';
                const files = Array.from(this.files || []);
                let videoCount = 0;

                files.forEach((f, idx) => {
                    if (videoExtRegex.test(f.name)) {
                        videoCount++;
                        const wrap = document.createElement('div');
                        wrap.className = 'd-flex align-items-center gap-2';
                        wrap.innerHTML = `
                            <span style="min-width: 140px; font-size:12px; color: var(--text-secondary);">${f.name}</span>
                            <input type="file" name="thumbnail_files[${idx}]" accept="image/*" class="form-control form-control-sm">
                        `;
                        thumbnailsInputs.appendChild(wrap);
                    }
                });

                thumbnailsWrap.style.display = videoCount > 0 ? '' : 'none';
            });
        }
    })();
</script>
@endsection
