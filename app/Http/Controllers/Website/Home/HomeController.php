<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\FAQ;
use App\Models\Highlight;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teamMembers  = TeamMember::active()->ordered()->get();
        $clients      = Client::active()->ordered()->get();
        $testimonials = Testimonial::approved()->ordered()->get();
        $faqs         = FAQ::active()->ordered()->get();
        $highlights   = Highlight::active()->ordered()->get();

        $tagLabels = config('constants.highlights.tags', []);
        $highlightTags = $highlights->pluck('tag')->filter()->unique()->values()
            ->mapWithKeys(fn($tag) => [$tag => $tagLabels[$tag] ?? ucwords(str_replace('_', ' ', $tag))]);

        $commercialHighlights = $highlights->where('tag', 'commercial')->values();
        $weddingHighlights    = $highlights->where('tag', 'highlight')->values();

        return view('website.pages.index', compact(
            'teamMembers', 'clients', 'testimonials', 'faqs', 'highlights', 'highlightTags',
            'commercialHighlights', 'weddingHighlights'
        ));
    }
}
