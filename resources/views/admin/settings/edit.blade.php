@extends('admin.layouts.app')

@section('title', 'Company Settings')

@section('content')

    @if(session('success'))
        <div style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" id="settings-form">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-2">
                <h4 class="text-white mb-0">Company Settings</h4>
                <div class="d-flex gap-2">
                    <button type="button" id="add-row-btn" class="btn btn-sm btn-outline-warning">+ Add Row</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save All</button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm mb-0" id="settings-table">
                        <thead>
                        <tr>
                            <th style="width: 50px;">Sr.</th>
                            <th style="width: 280px;">Key <span class="text-danger">*</span></th>
                            <th>Value</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="settings-tbody">
                        @php
                            $oldSettings = old('settings');
                            $rows = $oldSettings ?: $settings->map(fn($s) => [
                                'id' => $s->id,
                                'key' => $s->key,
                                'value' => $s->value,
                                'is_deletable' => (bool) $s->is_deletable,
                            ])->toArray();
                        @endphp

                        @forelse($rows as $index => $row)
                            @php $isDeletable = !empty($row['is_deletable']); @endphp
                            <tr data-row-index="{{ $index }}">
                                <td class="sr-cell">{{ $index + 1 }}</td>
                                <td>
                                    <input type="hidden" name="settings[{{ $index }}][id]" value="{{ $row['id'] ?? '' }}">
                                    <input type="text"
                                           name="settings[{{ $index }}][key]"
                                           value="{{ $row['key'] ?? '' }}"
                                           class="form-control form-control-sm @error('settings.'.$index.'.key') is-invalid @enderror"
                                           placeholder="e.g. company_name"
                                           required>
                                    @error('settings.'.$index.'.key')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea name="settings[{{ $index }}][value]"
                                              class="form-control form-control-sm @error('settings.'.$index.'.value') is-invalid @enderror"
                                              rows="1"
                                              placeholder="Enter value">{{ $row['value'] ?? '' }}</textarea>
                                    @error('settings.'.$index.'.value')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    @if(!empty($row['id']) && $isDeletable)
                                        <button type="button"
                                                class="btn-delete delete-existing"
                                                data-url="{{ route('admin.settings.destroy', $row['id']) }}"
                                                data-name="{{ $row['key'] }}"
                                                style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px;">
                                            Delete
                                        </button>
                                    @elseif(!empty($row['id']))
                                        <span style="padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; background-color: rgba(212, 175, 55, 0.15); color: var(--accent-gold);">
                                            System
                                        </span>
                                    @else
                                        <button type="button"
                                                class="btn-remove-row"
                                                style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px;">
                                            Remove
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-row">
                                <td colspan="4" style="text-align: center; padding: 32px; color: var(--text-secondary);">
                                    No settings found. Click <strong>+ Add Row</strong> to create one.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center p-2">
                <small class="text-muted">Keys can contain letters, numbers, underscore, hyphen and dot only.</small>
                <div class="d-flex gap-2">
                    <button type="button" id="add-row-btn-bottom" class="btn btn-sm btn-outline-warning">+ Add Row</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save All</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
<script>
    (function () {
        const tbody = document.getElementById('settings-tbody');
        const emptyRow = document.getElementById('empty-row');

        function nextIndex() {
            const rows = tbody.querySelectorAll('tr[data-row-index]');
            let max = -1;
            rows.forEach(r => {
                const idx = parseInt(r.getAttribute('data-row-index'), 10);
                if (!isNaN(idx) && idx > max) max = idx;
            });
            return max + 1;
        }

        function reNumberSr() {
            const rows = tbody.querySelectorAll('tr[data-row-index]');
            rows.forEach((r, i) => {
                const cell = r.querySelector('.sr-cell');
                if (cell) cell.textContent = i + 1;
            });
        }

        function addRow() {
            if (emptyRow && emptyRow.parentNode) {
                emptyRow.parentNode.removeChild(emptyRow);
            }

            const idx = nextIndex();
            const tr = document.createElement('tr');
            tr.setAttribute('data-row-index', idx);
            tr.innerHTML = `
                <td class="sr-cell"></td>
                <td>
                    <input type="hidden" name="settings[${idx}][id]" value="">
                    <input type="text" name="settings[${idx}][key]" value=""
                           class="form-control form-control-sm" placeholder="e.g. new_key" required>
                </td>
                <td>
                    <textarea name="settings[${idx}][value]" class="form-control form-control-sm" rows="1" placeholder="Enter value"></textarea>
                </td>
                <td>
                    <button type="button" class="btn-remove-row"
                            style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-weight: 500; font-size: 12px; padding: 4px 8px;">
                        Remove
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
            reNumberSr();
            tr.querySelector('input[type="text"]').focus();
        }

        document.getElementById('add-row-btn').addEventListener('click', addRow);
        document.getElementById('add-row-btn-bottom').addEventListener('click', addRow);

        // Remove unsaved row
        tbody.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-remove-row')) {
                const row = e.target.closest('tr');
                if (row) {
                    row.parentNode.removeChild(row);
                    reNumberSr();
                }
            }
        });

        // Delete existing (server) row with SweetAlert
        tbody.addEventListener('click', function (e) {
            if (e.target.classList.contains('delete-existing')) {
                const url  = e.target.getAttribute('data-url');
                const name = e.target.getAttribute('data-name');

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
            }
        });

        // Client-side duplicate-key check before submit
        document.getElementById('settings-form').addEventListener('submit', function (e) {
            const keys = tbody.querySelectorAll('input[name^="settings"][name$="[key]"]');
            const seen = {};
            let duplicate = null;

            keys.forEach(input => {
                const k = (input.value || '').trim();
                if (!k) return;
                if (seen[k]) {
                    duplicate = k;
                } else {
                    seen[k] = true;
                }
            });

            if (duplicate) {
                e.preventDefault();
                Swal.fire({
                    title: 'Duplicate Key',
                    text: `The key "${duplicate}" is used more than once. Keys must be unique.`,
                    icon: 'error',
                    confirmButtonColor: '#d4af37',
                });
            }
        });
    })();
</script>

<style>
    #settings-table td { vertical-align: middle; }
    #settings-table textarea { resize: vertical; min-height: 32px; }
</style>
@endsection
