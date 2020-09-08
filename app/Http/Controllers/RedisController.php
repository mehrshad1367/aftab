<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index($id)
    {
        if (Redis::get('userRedis',$id)) {
            $user = Redis::get('userRedis', $id);

            return view('redis.view', ['user' => $user]);
        }

        $user=User::findOrFail($id);
        Redis::set('userRedis',$user);

        return view('redis.view',['user' => $user]);


    }
}
