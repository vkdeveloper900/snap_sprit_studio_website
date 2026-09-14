@extends('admin.layouts.app')

@section('title', 'Contact Enquiries')

@section('content')

    @if(session('success'))
        <div
            style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Contact Enquiries</h4>
            <span class="badge badge-warning" style="background-color: rgba(251, 191, 36, 0.2); color: #fbbf24; padding: 6px 12px; border-radius: 4px;">
                {{ $enquiries->total() }} Total
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th style="width: 50px;">Sr.</th>
                        <th style="width: 180px;">Client Name</th>
                        <th style="width: 150px;">Email</th>
                        <th style="width: 120px;">Phone</th>
                        <th style="width: 150px;">Project Type</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 120px;">Date</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($enquiries as $index => $enquiry)
                        <tr style="@if($enquiry->status === 'new') background-color: rgba(251, 191, 36, 0.08); @endif">
                            <td>{{ ($enquiries->currentPage() - 1) * $enquiries->perPage() + $index + 1 }}</td>
                            <td>
                                <strong style="color: @if($enquiry->status === 'new') #fbbf24 @else var(--text-primary) @endif">
                                    {{ $enquiry->name }}
                                </strong>
                            </td>
                            <td>{{ $enquiry->email }}</td>
                            <td>{{ $enquiry->phone }}</td>
                            <td>{{ $enquiry->service_interested ?? '-' }}</td>
                            <td>
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;
                                    @switch($enquiry->status)
                                        @case('new')
                                            background-color: rgba(251, 191, 36, 0.2); color: #fbbf24;
                                            @break
                                        @case('viewed')
                                            background-color: rgba(59, 130, 246, 0.2); color: #3b82f6;
                                            @break
                                        @case('in_progress')
                                            background-color: rgba(168, 85, 247, 0.2); color: #a855f7;
                                            @break
                                        @case('completed')
                                            background-color: rgba(74, 222, 128, 0.2); color: #4ade80;
                                            @break
                                        @case('archived')
                                            background-color: rgba(107, 114, 128, 0.2); color: #6b7280;
                                            @break
                                    @endswitch
                                ">
                                    {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                                </span>
                            </td>
                            <td style="font-size: 12px;">
                                {{ $enquiry->created_at->format('d M Y') }}<br>
                                <span style="color: var(--text-secondary); font-size: 11px;">{{ $enquiry->created_at->format('H:i') }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn-edit"
                                   style="color: var(--accent-gold); text-decoration: none; font-weight: 500; font-size: 12px; padding: 4px 8px; display: inline-block;">View</a>
                                <button type="button" class="btn-delete delete-btn"
                                        data-url="{{ route('admin.enquiries.destroy', $enquiry->id) }}"
                                        data-name="{{ $enquiry->name }}"
                                        style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px; text-decoration: none;">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 32px; color: var(--text-secondary);">
                                No enquiries found yet
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer p-0">
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $enquiries->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const url = this.getAttribute('data-url');

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete the enquiry from "${name}". This action cannot be undone!`,
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
                    form.innerHTML = `
                        @csrf
                        @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>
@endsection