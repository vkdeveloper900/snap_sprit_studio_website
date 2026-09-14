@extends('admin.layouts.app')

@section('title', 'View Enquiry')

@section('content')

    @if(session('success'))
        <div
            style="background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #4ade80;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-2">
            <h4 class="text-white">Enquiry from {{ $enquiry->name }}</h4>
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-outline-danger">Back to List</a>
        </div>

        <div class="card-body">
            <div class="row g-3">
                <!-- Client Information -->
                <div class="col-12">
                    <h5 style="color: var(--text-primary); margin-bottom: 16px; font-weight: 600;">Client Information</h5>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Name</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">{{ $enquiry->name }}</p>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">
                        <a href="mailto:{{ $enquiry->email }}" style="color: var(--accent-gold); text-decoration: none;">{{ $enquiry->email }}</a>
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Phone</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">
                        <a href="tel:{{ $enquiry->phone }}" style="color: var(--accent-gold); text-decoration: none;">{{ $enquiry->phone }}</a>
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Project Type</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">{{ $enquiry->service_interested ?? '-' }}</p>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Project Date</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">
                        @if($enquiry->subject)
                            {{ \Carbon\Carbon::parse($enquiry->subject)->format('d M Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <label style="color: var(--text-secondary); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Received On</label>
                    <p style="color: var(--text-primary); margin-top: 4px;">{{ $enquiry->created_at->format('d M Y, h:i A') }}</p>
                </div>

                <!-- Message -->
                <div class="col-12" style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 16px;">
                    <h5 style="color: var(--text-primary); margin-bottom: 16px; font-weight: 600;">Message</h5>
                </div>

                <div class="col-12">
                    <div style="background-color: rgba(26, 35, 50, 0.5); padding: 16px; border-radius: 6px; border-left: 3px solid var(--accent-gold);">
                        <p style="color: var(--text-primary); line-height: 1.6; margin: 0;">
                            {{ $enquiry->message ?? '(No message)' }}
                        </p>
                    </div>
                </div>

                <!-- Status & Notes -->
                <div class="col-12" style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 16px;">
                    <h5 style="color: var(--text-primary); margin-bottom: 16px; font-weight: 600;">Status & Notes</h5>
                </div>

                <div class="col-12">
                    <form method="POST" action="{{ route('admin.enquiries.update', $enquiry->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="new" @if($enquiry->status == 'new') selected @endif>New</option>
                                    <option value="viewed" @if($enquiry->status == 'viewed') selected @endif>Viewed</option>
                                    <option value="in_progress" @if($enquiry->status == 'in_progress') selected @endif>In Progress</option>
                                    <option value="completed" @if($enquiry->status == 'completed') selected @endif>Completed</option>
                                    <option value="archived" @if($enquiry->status == 'archived') selected @endif>Archived</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="notes" class="form-label">Internal Notes</label>
                                <textarea id="notes" name="notes" rows="4" class="form-control @error('notes') is-invalid @enderror" placeholder="Add internal notes about this enquiry...">{{ old('notes', $enquiry->notes) }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Additional Info -->
                <div class="col-12" style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 16px;">
                    <div style="display: flex; justify-content: space-between; font-size: 12px; color: var(--text-secondary);">
                        <span>IP Address: {{ $enquiry->ip_address ?? 'N/A' }}</span>
                        @if($enquiry->responded_at)
                            <span>Last Responded: {{ $enquiry->responded_at->format('d M Y, h:i A') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection