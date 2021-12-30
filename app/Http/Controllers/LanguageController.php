<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function getLanguages(Request $request)
    {
        $languages = Language::all();
        if ($request->search !== null) {
            $search = $request->search;
            $languages = $languages->filter(function ($item) use ($search) {
                return false !== stripos($item->name, $search);
            });
        }
        return response()->json($languages);
    }
}
