<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util\Zagma;
use Illuminate\Http\Request;

class ZagmaController extends Controller
{
    public function getPrice(Zagma $zagma)
    {
        $zagma=$zagma->getPrice();
        return response()->json($zagma);
    }

    public function orderStatus(Zagma $zagma)
    {
        $zagma=$zagma->orderstatus();
        return response()->json($zagma);
    }

    public function requestPricePostNew(Zagma $zagma)
    {
        $zagma=$zagma->requestpricepostnew();
        return response()->json($zagma);
    }

    public function orderWithArray(Zagma $zagma)
    {
        $zagma=$zagma->orderwitharray();
        return response()->json($zagma);
    }

}
