<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        dd($request->all());
        $request->session()->put('locale', $request->language);
        return response()->json(['status' => 'ok']);
    }
    
}
