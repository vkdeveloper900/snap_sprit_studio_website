<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(10);
        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        if ($enquiry->status === 'new') {
            $enquiry->update(['status' => 'viewed']);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,viewed,in_progress,completed,archived',
            'notes' => 'nullable|string',
        ]);

        $enquiry->update($validated);
        return redirect()->route('admin.enquiries.show', $id)->with('success', 'Enquiry updated successfully');
    }

    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $name = $enquiry->name;
        $enquiry->delete();
        return redirect()->route('admin.enquiries.index')->with('success', "Enquiry from {$name} deleted successfully");
    }
}
