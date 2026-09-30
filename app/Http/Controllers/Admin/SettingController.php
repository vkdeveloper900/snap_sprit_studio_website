<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = CompanySetting::orderBy('id')->get();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings'           => 'required|array|min:1',
            'settings.*.id'      => 'nullable|integer|exists:company_settings,id',
            'settings.*.key'     => 'required|string|max:255|regex:/^[A-Za-z0-9_\-\.]+$/',
            'settings.*.value'   => 'nullable|string|max:65535',
        ], [
            'settings.required'         => 'At least one setting is required.',
            'settings.*.key.required'   => 'Key is required for every row.',
            'settings.*.key.regex'      => 'Key can only contain letters, numbers, underscore, hyphen and dot.',
            'settings.*.key.max'        => 'Key must not exceed 255 characters.',
            'settings.*.value.max'      => 'Value is too long.',
        ]);

        $rows = $request->input('settings', []);

        $seenKeys = [];
        foreach ($rows as $index => $row) {
            $key = trim($row['key'] ?? '');
            if ($key === '') {
                continue;
            }
            if (isset($seenKeys[$key])) {
                return back()->withInput()->withErrors([
                    "settings.$index.key" => "Duplicate key \"$key\" found. Keys must be unique.",
                ]);
            }
            $seenKeys[$key] = true;
        }

        foreach ($rows as $row) {
            $key   = trim($row['key'] ?? '');
            $value = $row['value'] ?? null;

            if ($key === '') {
                continue;
            }

            if (!empty($row['id'])) {
                $setting = CompanySetting::find($row['id']);
                if ($setting) {
                    $setting->update(['key' => $key, 'value' => $value]);
                }
            } else {
                CompanySetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value, 'is_deletable' => true]
                );
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Company settings saved successfully.');
    }

    public function destroy($id)
    {
        $setting = CompanySetting::findOrFail($id);

        if (!$setting->is_deletable) {
            return redirect()->route('admin.settings.edit')
                ->withErrors(['delete' => "\"{$setting->key}\" is a system setting and cannot be deleted."]);
        }

        $setting->delete();

        return redirect()->route('admin.settings.edit')->with('success', 'Setting deleted successfully.');
    }
}
