<?php

namespace App\Http\Controllers\lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function ln($ln){

        $cookie = cookie('lang',$ln);
        return back()->cookie($cookie);
    }
}
