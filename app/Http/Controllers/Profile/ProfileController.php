<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $user;
    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function index(){
        return $this->user->all();
    }

    public function show($id){
        $user=$this->user->get($id);
        return view('profile.index',['user'=>$user]);
    }
}
