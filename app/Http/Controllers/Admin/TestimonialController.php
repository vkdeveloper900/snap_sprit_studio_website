<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'company_name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('', 'testimonials');
        }

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'order' => 'nullable|integer',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'company_name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) {
                Storage::disk('testimonials')->delete($testimonial->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('', 'testimonials');
        }

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->avatar) {
            Storage::disk('testimonials')->delete($testimonial->avatar);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $item) {
            Testimonial::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return successResponse('Order updated successfully');
    }
}
