<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;


class LogoGeneratorController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate(['logo' => 'required|image']);
        $file = $request->file('logo');
        $filename = $file->getClientOriginalName();
        $path = '/assets/images/generated-logos';

        // Move the file
        $file->move(public_path($path), $filename);

        $setting = WebsiteSetting::where('key', 'cms_logo')->first();

        $setting->update([
            'value' => sprintf('%s/%s', $path, $filename),
        ]);

        return response()->json(['success' => true, 'message' => 'Logo updated!']);

    }
}
