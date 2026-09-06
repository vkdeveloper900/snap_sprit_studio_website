@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Welcome to Admin Dashboard</h1>
            <p>Hi {{ auth()->user()->name }}, welcome back!</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-content">
                    <h3>New Enquiries</h3>
                    <p class="stat-number">{{ $stats['new_enquiries'] }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🎨</div>
                <div class="stat-content">
                    <h3>Portfolio Items</h3>
                    <p class="stat-number">{{ $stats['total_portfolio'] }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⭐</div>
                <div class="stat-content">
                    <h3>Testimonials</h3>
                    <p class="stat-number">{{ $stats['total_testimonials'] }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🖼️</div>
                <div class="stat-content">
                    <h3>Media Files</h3>
                    <p class="stat-number">{{ $stats['total_media'] }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🎯</div>
                <div class="stat-content">
                    <h3>Services</h3>
                    <p class="stat-number">{{ $stats['total_services'] }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-content">
                    <h3>Team Members</h3>
                    <p class="stat-number">{{ $stats['total_team'] }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="{{ route('admin.portfolio.index') }}" class="action-btn">
                    <span>📸</span> Manage Portfolio
                </a>
                <a href="{{ route('admin.services.index') }}" class="action-btn">
                    <span>🎯</span> Manage Services
                </a>
                <a href="{{ route('admin.team.index') }}" class="action-btn">
                    <span>👥</span> Manage Team
                </a>
                <a href="{{ route('admin.enquiries.index') }}" class="action-btn">
                    <span>📧</span> View Enquiries
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="action-btn">
                    <span>💬</span> Manage Testimonials
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="action-btn">
                    <span>❓</span> Manage FAQs
                </a>
            </div>
        </div>
    </div>

    <style>
        .dashboard-container {
            padding: 30px;
            max-width: 1400px;
        }

        .dashboard-header {
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            font-size: 32px;
            color: #0B0B0B;
            margin-bottom: 5px;
        }

        .dashboard-header p {
            color: #A7A39B;
            font-size: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #F7F7F5;
            border: 1px solid #E8E8E8;
            border-radius: 8px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .stat-icon {
            font-size: 40px;
            min-width: 60px;
            text-align: center;
        }

        .stat-content h3 {
            font-size: 14px;
            color: #A7A39B;
            font-weight: 500;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #B8A07A;
            margin: 0;
        }

        .quick-actions {
            margin-top: 40px;
        }

        .quick-actions h2 {
            font-size: 24px;
            color: #0B0B0B;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
        }

        .action-btn {
            background: linear-gradient(135deg, #B8A07A 0%, #9d8659 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(184, 160, 122, 0.3);
            text-decoration: none;
            color: white;
        }

        .action-btn span {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection
