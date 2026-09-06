<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
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
        return view('website.pages.team');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

    public function submitContact(Request $request)
    {
        // Handle contact form submission
    }

    public function privacy()
    {
        return view('website.pages.privacy');
    }

    public function terms()
    {
        return view('website.pages.terms');
    }
}
