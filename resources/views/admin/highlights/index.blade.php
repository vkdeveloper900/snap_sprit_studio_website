@extends('admin.layouts.app')

@section('title', 'Highlights Management')

@section('content')

    @if(session('success'))
        <div style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Highlights</h4>
            <a href="{{ route('admin.highlights.create') }}" class="btn btn-sm btn-outline-danger">+ Add Highlight</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm mb-0">
                    <thead>
                    <tr>
                        <th style="width: 50px;">Sr.</th>
                        <th style="width: 90px;">Preview</th>
                        <th>Title</th>
                        <th style="width: 100px;">Tag</th>
                        <th style="width: 80px;">Type</th>
                        <th style="width: 120px;">Location</th>
                        <th style="width: 70px;">Seq.</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 130px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="highlights-table">
                    @forelse($highlights as $index => $highlight)
                        <tr draggable="true" data-id="{{ $highlight->id }}" data-order="{{ $highlight->sequence }}">
                            <td>{{ $highlights->firstItem() + $index }}</td>
                            <td>
                                @php $preview = $highlight->type === 'video' ? $highlight->thumbnail_full_url : $highlight->media_full_url; @endphp
                                @if($preview)
                                    <img src="{{ $preview }}" alt="{{ $highlight->title }}"
                                         style="width: 60px; height: 40px; border-radius: 4px; object-fit: cover;">
                                @else
                                    <div style="width: 60px; height: 40px; border-radius: 4px; background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center; color: var(--text-secondary); font-size: 10px;">—</div>
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($highlight->title, 60) }}</td>
                            <td>
                                <span style="padding: 2px 8px; border-radius: 4px; font-size: 11px; background: rgba(212,175,55,0.15); color: var(--accent-gold);">
                                    {{ config('constants.highlights.tags.'.$highlight->tag, $highlight->tag) }}
                                </span>
                            </td>
                            <td>
                                @if($highlight->type === 'video')
                                    <span style="color:#ff4545; font-weight:600; font-size:12px;">▶ Video</span>
                                @else
                                    <span style="color:#4ade80; font-weight:600; font-size:12px;">🖼 Image</span>
                                @endif
                            </td>
                            <td>{{ $highlight->location ?? '—' }}</td>
                            <td><strong>{{ $highlight->sequence }}</strong></td>
                            <td>
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;
                                             @if($highlight->status === 'active') background-color: rgba(74, 222, 128, 0.2); color: #4ade80;
                                             @elseif($highlight->status === 'draft') background-color: rgba(255, 193, 7, 0.2); color: #ffc107;
                                             @else background-color: rgba(255, 69, 69, 0.2); color: #ff4545; @endif">
                                    {{ config('constants.highlights.statuses.'.$highlight->status, $highlight->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.highlights.edit', $highlight->id) }}"
                                   style="color: var(--accent-gold); text-decoration: none; font-weight: 500; font-size: 12px; padding: 4px 8px; display: inline-block;">Edit</a>
                                <button type="button" class="delete-btn"
                                        data-url="{{ route('admin.highlights.destroy', $highlight->id) }}"
                                        data-name="{{ addslashes(\Illuminate\Support\Str::limit($highlight->title, 50)) }}"
                                        style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px;">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" style="text-align: center; padding: 32px; color: var(--text-secondary);">
                                No highlights found. <a href="{{ route('admin.highlights.create') }}" style="color: var(--accent-gold); text-decoration: none;">Add the first one</a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer p-0">
            <div class="d-flex justify-content-center mt-4">
                {{ $highlights->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const name = this.getAttribute('data-name');
            const url  = this.getAttribute('data-url');
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete "${name}". This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d4af37',
                cancelButtonColor: '#ff4545',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
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

    const tableBody = document.getElementById('highlights-table');
    if (tableBody && typeof Sortable !== 'undefined') {
        Sortable.create(tableBody, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function () {
                const items = tableBody.querySelectorAll('tr[data-id]');
                const orders = [];
                items.forEach((item, index) => {
                    orders.push({ id: item.getAttribute('data-id'), order: index + 1 });
                });
                fetch('{{ route("admin.highlights.reorder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ orders: orders })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({ title: 'Success!', text: 'Sequence updated.', icon: 'success', timer: 1500 });
                    }
                })
                .catch(() => Swal.fire({ title: 'Error!', text: 'Failed to update sequence.', icon: 'error' }));
            }
        });
    }
</script>
<style>
    .sortable-ghost { opacity: 0.5; background-color: rgba(212, 175, 55, 0.2); }
    tbody tr[data-id] { cursor: grab; }
    tbody tr[data-id]:active { cursor: grabbing; }
</style>
@endsection
