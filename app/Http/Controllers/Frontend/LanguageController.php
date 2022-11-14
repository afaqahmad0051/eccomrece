<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function English(){
        session()->get('language');
        session()->forget('language');
        Session()->put('language','english');
        return redirect()->back();
    }

    public function Urdu(){
        session()->get('language');
        session()->forget('language');
        Session()->put('language','urdu');
        return redirect()->back();
    }
}
