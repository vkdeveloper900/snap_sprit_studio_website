<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::ordered()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('', 'clients');
        }

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client added successfully');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'order' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo')) {
            if ($client->logo) {
                Storage::disk('clients')->delete($client->logo);
            }
            $validated['logo'] = $request->file('logo')->store('', 'clients');
        }

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if ($client->logo) {
            Storage::disk('clients')->delete($client->logo);
        }
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $item) {
            Client::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return successResponse('Order updated successfully');
    }
}
