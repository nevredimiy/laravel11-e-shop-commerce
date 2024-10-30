<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Option;

class DashboardController extends Controller
{
    public function create() {
        return view('dashboard.general-settings');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logoImage' => 'mimes:png,jpeg,jpg|max:2048'
        ]);

        $filePath = public_path('assets/images');

        if ($request->hasFile('logoImage')){
            $file = $request->file('logoImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'assets/images';
            $file->move($path, $filename);
            // Storage::disk('public')->put($filename, 'Contents');
        }

        Option::create([
            'logo' => $filename
        ]);

        // return redirect(route('dashboard.create'));
        $request->session()->flash('success', 'Logo is upload');
        return redirect()->route('dashboard.create');
    }
}

