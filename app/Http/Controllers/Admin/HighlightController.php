<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use App\Models\HighlightMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class HighlightController extends Controller
{
    public function index()
    {
        $highlights = Highlight::ordered()->paginate(config('constants.pagination.admin', 15));
        return view('admin.highlights.index', compact('highlights'));
    }

    public function create()
    {
        $tags     = config('constants.highlights.tags', []);
        $types    = config('constants.highlights.types', []);
        $statuses = config('constants.highlights.statuses', []);

        return view('admin.highlights.create', compact('tags', 'types', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateHighlight($request);
        $data = $this->handleMedia($request, null, $validated);

        Highlight::create($data);

        return redirect()->route('admin.highlights.index')->with('success', 'Highlight added successfully');
    }

    public function edit($id)
    {
        $highlight = Highlight::with('medias')->findOrFail($id);
        $tags      = config('constants.highlights.tags', []);
        $types     = config('constants.highlights.types', []);
        $statuses  = config('constants.highlights.statuses', []);

        return view('admin.highlights.edit', compact('highlight', 'tags', 'types', 'statuses'));
    }

    public function storeMedia(Request $request, $id)
    {
        $highlight = Highlight::findOrFail($id);

        $imageMimes = config('constants.media.image_mimes', 'jpeg,png,jpg,gif,svg,webp');
        $videoMimes = config('constants.media.video_mimes', 'mp4,mov,avi,wmv,webm');
        $maxImageKb = (int) config('constants.media.max_image_size_kb', 2048);
        $maxVideoKb = (int) config('constants.media.max_video_size_kb', 51200);

        $request->validate([
            'media_files'   => 'required|array|min:1',
            'media_files.*' => [
                'required', 'file',
                'mimes:' . $imageMimes . ',' . $videoMimes,
                'max:' . $maxVideoKb,
            ],
            'thumbnail_files'   => 'nullable|array',
            'thumbnail_files.*' => ['nullable', 'image', 'mimes:' . $imageMimes, 'max:' . $maxImageKb],
        ], [
            'media_files.required' => 'Please select at least one image or video.',
            'media_files.*.mimes'  => 'Allowed formats: ' . $imageMimes . ' (images), ' . $videoMimes . ' (videos).',
        ]);

        $files      = $request->file('media_files', []);
        $thumbnails = $request->file('thumbnail_files', []);
        $imageExts  = explode(',', $imageMimes);
        $videoExts  = explode(',', $videoMimes);

        foreach ($files as $index => $file) {
            $ext  = strtolower($file->getClientOriginalExtension());
            $type = in_array($ext, $videoExts) ? 'video' : 'image';

            $mediaPath = $file->store('', 'highlights');

            $thumbnailPath = null;
            if ($type === 'video' && isset($thumbnails[$index]) && $thumbnails[$index]) {
                $thumbnailPath = $thumbnails[$index]->store('', 'highlights');
            }

            HighlightMedia::create([
                'highlight_id'  => $highlight->id,
                'type'          => $type,
                'media_url'     => $mediaPath,
                'thumbnail_url' => $thumbnailPath,
                'is_active'     => true,
            ]);
        }

        return redirect()->route('admin.highlights.edit', $highlight->id)
            ->with('success', count($files) . ' media item(s) added to highlight.');
    }

    public function destroyMedia($id, $mediaId)
    {
        $media = HighlightMedia::where('highlight_id', $id)->findOrFail($mediaId);

        if ($media->media_url) {
            Storage::disk('highlights')->delete($media->media_url);
        }
        if ($media->thumbnail_url) {
            Storage::disk('highlights')->delete($media->thumbnail_url);
        }

        $media->delete();

        return redirect()->route('admin.highlights.edit', $id)->with('success', 'Media removed.');
    }

    public function reorderMedia(Request $request, $id)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $item) {
            HighlightMedia::where('highlight_id', $id)
                ->where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }
        return successResponse('Media order updated');
    }

    public function update(Request $request, $id)
    {
        $highlight = Highlight::findOrFail($id);
        $validated = $this->validateHighlight($request, $highlight);
        $data = $this->handleMedia($request, $highlight, $validated);

        $highlight->update($data);

        return redirect()->route('admin.highlights.index')->with('success', 'Highlight updated successfully');
    }

    public function destroy($id)
    {
        $highlight = Highlight::with('medias')->findOrFail($id);

        if ($highlight->media_url && !$highlight->is_external_media) {
            Storage::disk('highlights')->delete($highlight->media_url);
        }
        if ($highlight->thumbnail_url) {
            Storage::disk('highlights')->delete($highlight->thumbnail_url);
        }

        foreach ($highlight->medias as $m) {
            if ($m->media_url)     { Storage::disk('highlights')->delete($m->media_url); }
            if ($m->thumbnail_url) { Storage::disk('highlights')->delete($m->thumbnail_url); }
            $m->delete();
        }

        $highlight->delete();

        return redirect()->route('admin.highlights.index')->with('success', 'Highlight deleted successfully');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $item) {
            Highlight::where('id', $item['id'])->update(['sequence' => $item['order']]);
        }
        return successResponse('Order updated successfully');
    }

    protected function handleMedia(Request $request, ?Highlight $highlight, array $validated): array
    {
        $type       = $request->input('type');
        $oldMedia   = $highlight?->media_url;
        $oldIsFile  = $highlight && !$highlight->is_external_media;
        $mediaSource = $request->input('media_source', 'upload'); // 'upload' or 'link'

        if ($type === 'image') {
            if ($request->hasFile('media_file')) {
                if ($oldMedia && $oldIsFile) {
                    Storage::disk('highlights')->delete($oldMedia);
                }
                $validated['media_url'] = $request->file('media_file')->store('', 'highlights');
            } elseif (!$highlight || $highlight->type !== 'image') {
                $validated['media_url'] = $request->input('media_url');
            } else {
                $validated['media_url'] = $oldMedia;
            }
        } else { // video
            if ($mediaSource === 'link') {
                if ($oldMedia && $oldIsFile) {
                    Storage::disk('highlights')->delete($oldMedia);
                }
                $validated['media_url'] = $request->input('media_url');
            } else { // upload
                if ($request->hasFile('media_file')) {
                    if ($oldMedia && $oldIsFile) {
                        Storage::disk('highlights')->delete($oldMedia);
                    }
                    $validated['media_url'] = $request->file('media_file')->store('', 'highlights');
                } else {
                    $validated['media_url'] = $oldMedia;
                }
            }
        }

        if ($request->hasFile('thumbnail_file')) {
            if ($highlight?->thumbnail_url) {
                Storage::disk('highlights')->delete($highlight->thumbnail_url);
            }
            $validated['thumbnail_url'] = $request->file('thumbnail_file')->store('', 'highlights');
        }

        unset($validated['media_file'], $validated['thumbnail_file'], $validated['media_source']);

        return $validated;
    }

    protected function validateHighlight(Request $request, ?Highlight $highlight = null): array
    {
        $isUpdate         = (bool) $highlight;
        $type             = $request->input('type');
        $mediaSource      = $request->input('media_source', 'upload');
        $hasOldMedia      = $isUpdate && !empty($highlight->media_url);
        $hasOldThumb      = $isUpdate && !empty($highlight->thumbnail_url);

        $imageMimes = config('constants.media.image_mimes', 'jpeg,png,jpg,gif,svg,webp');
        $videoMimes = config('constants.media.video_mimes', 'mp4,mov,avi,wmv,webm');
        $maxImageKb = (int) config('constants.media.max_image_size_kb', 2048);
        $maxVideoKb = (int) config('constants.media.max_video_size_kb', 51200);

        $rules = [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'tag'         => ['required', 'string', Rule::in(array_keys(config('constants.highlights.tags', [])))],
            'type'        => ['required', 'string', Rule::in(array_keys(config('constants.highlights.types', [])))],
            'location'    => 'nullable|string|max:255',
            'sequence'    => 'nullable|integer|min:0',
            'status'      => ['required', 'string', Rule::in(array_keys(config('constants.highlights.statuses', [])))],
        ];

        if ($type === 'image') {
            $rules['media_file'] = [
                $hasOldMedia ? 'nullable' : 'required',
                'image', 'mimes:' . $imageMimes, 'max:' . $maxImageKb,
            ];
        } elseif ($type === 'video') {
            $rules['media_source'] = ['required', Rule::in(['upload', 'link'])];

            if ($mediaSource === 'upload') {
                $rules['media_file'] = [
                    $hasOldMedia ? 'nullable' : 'required',
                    'file', 'mimes:' . $videoMimes, 'max:' . $maxVideoKb,
                ];
            } else {
                $rules['media_url'] = ['required', 'url', 'max:2048'];
            }

            $rules['thumbnail_file'] = [
                $hasOldThumb ? 'nullable' : 'required',
                'image', 'mimes:' . $imageMimes, 'max:' . $maxImageKb,
            ];
        }

        $messages = [
            'media_file.required'     => $type === 'video'
                ? 'A video file is required. Upload one or switch to "Video Link".'
                : 'An image file is required when type is Image.',
            'media_file.mimes'        => $type === 'video'
                ? 'Video must be one of: ' . $videoMimes
                : 'Image must be one of: ' . $imageMimes,
            'media_file.max'          => $type === 'video'
                ? 'Video file exceeds ' . round($maxVideoKb / 1024, 1) . ' MB limit.'
                : 'Image file is too large.',
            'media_url.required'      => 'A video URL is required. Provide one or switch to "Upload Video".',
            'media_url.url'           => 'Please enter a valid video URL.',
            'thumbnail_file.required' => 'Thumbnail image is required for video highlights.',
        ];

        return $request->validate($rules, $messages);
    }
}
