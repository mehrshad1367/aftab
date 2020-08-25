<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit($id){
        $user=$this->user->get($id);
        return view('profile.edit',['user'=>$user]);
    }

    public function update(Request $request,$id){

        $input=$request->all();
        $validation = $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|min:2|max:50',
        ]);
        if ($validation) {
            $this->user->update($input, $id);
            return redirect()->back();
        }else{
            return back();
        }

    }

    public function delete(){

    }

    public function avatar(Request $request,$id){
        $user=User::findOrFail($id);

        $user->update([$user->avatar = $request->file('avatar')->store('public')]);
        $user->save();

        return redirect(url('profile',['id'=> Auth::user()->id]));

    }
}
