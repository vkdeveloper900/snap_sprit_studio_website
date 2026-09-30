@extends('admin.layouts.app')

@section('title', 'FAQs Management')

@section('content')

    @if(session('success'))
        <div
            style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">FAQs</h4>
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-sm btn-outline-danger">+ Add FAQ</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm mb-0">
                    <thead>
                    <tr>
                        <th style="width: 50px;">Sr.</th>
                        <th>Question</th>
                        <th style="width: 130px;">Category</th>
                        <th style="width: 80px;">Order</th>
                        <th style="width: 80px;">Status</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="faqs-table">
                    @forelse($faqs as $index => $faq)
                        <tr draggable="true" data-id="{{ $faq->id }}" data-order="{{ $faq->order }}">
                            <td>{{ $faqs->firstItem() + $index }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($faq->question, 80) }}</td>
                            <td>{{ $faq->category ?? '—' }}</td>
                            <td><strong>{{ $faq->order }}</strong></td>
                            <td>
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; @if($faq->is_active) background-color: rgba(74, 222, 128, 0.2); color: #4ade80; @else background-color: rgba(255, 69, 69, 0.2); color: #ff4545; @endif">
                                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-edit"
                                   style="color: var(--accent-gold); text-decoration: none; font-weight: 500; font-size: 12px; padding: 4px 8px; display: inline-block;">Edit</a>
                                <button type="button" class="btn-delete delete-btn"
                                        data-url="{{ route('admin.faqs.destroy', $faq->id) }}"
                                        data-name="{{ addslashes(\Illuminate\Support\Str::limit($faq->question, 60)) }}"
                                        style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px;">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 32px; color: var(--text-secondary);">
                                No FAQs found. <a href="{{ route('admin.faqs.create') }}"
                                                  style="color: var(--accent-gold); text-decoration: none;">Add the first one</a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer p-0">
            <div class="d-flex justify-content-center mt-4">
                {{ $faqs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // SweetAlert Delete
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

    // Drag & Drop Reorder
    const tableBody = document.getElementById('faqs-table');
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

                fetch('{{ route("admin.faqs.reorder") }}', {
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
                        Swal.fire({ title: 'Success!', text: 'FAQ order updated.', icon: 'success', timer: 1500 });
                    }
                })
                .catch(() => {
                    Swal.fire({ title: 'Error!', text: 'Failed to update order.', icon: 'error' });
                });
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
