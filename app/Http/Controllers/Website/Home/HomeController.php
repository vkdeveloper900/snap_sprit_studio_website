<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        $clients = Client::active()->ordered()->get();
        $testimonials = Testimonial::approved()->ordered()->get();
        return view('website.pages.index', compact('teamMembers', 'clients', 'testimonials'));
    }
}
