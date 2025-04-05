<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $request->session()->put('locale', $request->language);
        
        return redirect()->back();
    }
}
