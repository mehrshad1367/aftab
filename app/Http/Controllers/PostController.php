<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Util\Zagma;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrice(Zagma $zagma)
    {

        dd($zagma->getPrice());
    }

    public function orderstatus(Zagma $zagma)
    {

        dd($zagma->orderstatus());
    }

    public function requestpricepostnew(Zagma $zagma)
    {

        dd($zagma->requestpricepostnew());
    }

    public function orderwitharray(Zagma $zagma)
    {

        dd($zagma->orderwitharray());
    }

}
