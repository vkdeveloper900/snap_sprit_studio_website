<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::ordered()->paginate(15);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question'  => 'required|string|max:500',
            'answer'    => 'required|string|max:5000',
            'category'  => 'nullable|string|max:100',
            'order'     => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? ((FAQ::max('order') ?? 0) + 1);

        FAQ::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added successfully');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);

        $validated = $request->validate([
            'question'  => 'required|string|max:500',
            'answer'    => 'required|string|max:5000',
            'category'  => 'nullable|string|max:100',
            'order'     => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy($id)
    {
        FAQ::findOrFail($id)->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $item) {
            FAQ::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return successResponse('Order updated successfully');
    }
}
