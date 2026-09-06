<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        // Store testimonial
    }

    public function edit($id)
    {
        return view('admin.testimonials.edit');
    }

    public function update(Request $request, $id)
    {
        // Update testimonial
    }

    public function destroy($id)
    {
        // Delete testimonial
    }
}
