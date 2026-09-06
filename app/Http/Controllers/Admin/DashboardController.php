<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Media;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'new_enquiries' => Enquiry::where('status', 'new')->count(),
            'total_portfolio' => Portfolio::count(),
            'total_testimonials' => Testimonial::count(),
            'total_media' => Media::count(),
            'total_services' => Service::count(),
            'total_team' => TeamMember::count(),
        ];

        $recent_enquiries = Enquiry::where('status', 'new')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_enquiries'));
    }
}
