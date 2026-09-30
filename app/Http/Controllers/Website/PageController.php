<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\FAQ;
use App\Models\Highlight;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('website.pages.about');
    }

    public function services()
    {
        return view('website.pages.services');
    }

    public function portfolio()
    {
        return view('website.pages.portfolio');
    }

    public function gallery()
    {
        return view('website.pages.gallery');
    }

    public function team()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('website.pages.team', compact('teamMembers'));
    }

    public function contact()
    {
        $faqs = FAQ::active()->ordered()->get();
        return view('website.pages.contact', compact('faqs'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'service_interested' => 'required|string|max:255',
            'subject' => 'nullable|date',
            'message' => 'nullable|string',
        ]);

        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'service_interested' => $validated['service_interested'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Thank you! We received your enquiry. Our team will contact you within 24 hours.');
    }

    public function privacy()
    {
        return view('website.pages.privacy');
    }

    public function terms()
    {
        return view('website.pages.terms');
    }

    public function highlightShow(Highlight $highlight)
    {
        abort_if($highlight->status !== 'active', 404);
        $highlight->load('activeMedias');
        return view('website.pages.highlight-show', compact('highlight'));
    }
}
