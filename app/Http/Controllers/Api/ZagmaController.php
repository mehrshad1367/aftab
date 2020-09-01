<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util\Zagma;
use Illuminate\Http\Request;

class ZagmaController extends Controller
{
    public function getPrice(Zagma $zagma)
    {
        $zagma->getPrice();
    }

    public function orderstatus(Zagma $zagma)
    {
        $zagma->orderstatus();
    }

    public function requestpricepostnew(Zagma $zagma)
    {
        $zagma->requestpricepostnew();
    }

    public function orderWithArray(Zagma $zagma)
    {

        $zagma->orderwitharray();
    }

}
