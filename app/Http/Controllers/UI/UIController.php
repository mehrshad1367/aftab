<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UIController extends Controller
{
    public function index(){

        return view('front.index');

    }

    public function contact(){
        return view('front.contact');
    }
}
