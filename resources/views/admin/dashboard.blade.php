@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="section-label">// DASHBOARD</div>
    <h1 class="page-heading">Welcome back, {{ auth()->user()->name }}</h1>

    <!-- Clock Card -->
    <div class="clock-card">
        <div class="live-indicator">
            <div class="live-dot"></div>
            LIVE
        </div>
        <div class="clock-display">
            <span class="clock-time-value" id="clock-time">10:52:44</span>
            <span class="clock-time-pm" id="clock-period">PM</span>
        </div>
        <div class="clock-date" id="clock-date">Sunday, 6 September 2026</div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">PROJECTS</div>
            <div class="stat-value">{{ $stats['total_portfolio'] ?? 3 }} total</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">RECENT NEW LEADS</div>
            <a href="{{ route('admin.enquiries.index') }}" class="stat-link">View all →</a>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const period = now.getHours() >= 12 ? 'PM' : 'AM';

            document.getElementById('clock-time').textContent = `${hours}:${minutes}:${seconds}`;
            document.getElementById('clock-period').textContent = period;

            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('en-US', options);
            document.getElementById('clock-date').textContent = dateString;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
@endsection
