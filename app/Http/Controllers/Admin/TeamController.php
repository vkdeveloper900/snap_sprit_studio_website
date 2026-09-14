<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::ordered()->paginate(10);
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'portfolio_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('', 'team');
        }

        TeamMember::create($validated);
        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'order' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'portfolio_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            if ($teamMember->avatar) {
                Storage::disk('team')->delete($teamMember->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('', 'team');
        }

        $teamMember->update($validated);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully');
    }

    public function destroy($id)
    {
        TeamMember::findOrFail($id)->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $item) {
            TeamMember::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return successResponse('Order updated successfully');
    }
}
