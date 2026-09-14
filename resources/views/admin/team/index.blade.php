@extends('admin.layouts.app')

@section('title', 'Team Management')

@section('content')

    @if(session('success'))
        <div
            style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Team Members</h4>
            <a href="{{ route('admin.team.create') }}" class="btn btn-sm btn-outline-danger">+ Add Member</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th style="width: 50px; cursor: grab;">Sr.</th>
                        <th style="width: 150px;">Avatar</th>
                        <th style="width: 200px;">Name</th>
                        <th style="width: 150px;">Designation</th>
                        <th style="width: 100px;">Order</th>
                        <th style="width: 80px;">Status</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="team-members-table">
                    @forelse($teamMembers as $index => $member)
                        <tr draggable="true" data-id="{{ $member->id }}" data-order="{{ $member->order }}">
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($member->avatar_url)
                                    <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}"
                                         style="width: 30px; height: 30px; border-radius: 4px; object-fit: cover;">
                                @else
                                    <div
                                        style="width: 50px; height: 50px; background-color: rgba(255, 255, 255, 0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--text-secondary);">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->designation }}</td>
                            <td><strong>{{ $member->order }}</strong></td>
                            <td>
                            <span
                                style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; @if($member->is_active) background-color: rgba(74, 222, 128, 0.2); color: #4ade80; @else background-color: rgba(255, 69, 69, 0.2); color: #ff4545; @endif">
                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.team.edit', $member->id) }}" class="btn-edit"
                                   style="color: var(--accent-gold); text-decoration: none; font-weight: 500; font-size: 12px; padding: 4px 8px; display: inline-block;">Edit</a>
                                <button type="button" class="btn-delete delete-btn"
                                        data-url="{{ route('admin.team.destroy', $member->id) }}"
                                        data-name="{{ $member->name }}"
                                        style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px; text-decoration: none;">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 32px; color: var(--text-secondary);">
                                No team members found. <a href="{{ route('admin.team.create') }}" style="color: var(--accent-gold); text-decoration: none;">Add
                                    the first one</a>
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
                {{ $teamMembers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // SweetAlert Delete Confirmation
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const url = this.getAttribute('data-url');

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

    // Sortable - Drag and Drop for Reordering
    const tableBody = document.getElementById('team-members-table');

    if (tableBody) {
        Sortable.create(tableBody, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function(evt) {
                const items = tableBody.querySelectorAll('tr');
                const orders = [];

                items.forEach((item, index) => {
                    const id = item.getAttribute('data-id');
                    const newOrder = index + 1;
                    orders.push({ id: id, order: newOrder });
                });

                // Send update to server
                fetch('{{ route("admin.team.reorder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ orders: orders })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Team member order updated successfully.',
                            icon: 'success',
                            timer: 2000
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to update order.',
                        icon: 'error'
                    });
                });
            }
        });
    }
</script>

<style>
    .sortable-ghost {
        opacity: 0.5;
        background-color: rgba(212, 175, 55, 0.2);
    }

    tbody tr {
        cursor: grab;
    }

    tbody tr:active {
        cursor: grabbing;
    }
</style>
@endsection
