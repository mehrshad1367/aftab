<?php
namespace App\Http\Controllers\Util;

class Zagma
{

    private static $base_url = "http://api.zagma.ir/";
    private static $shopkod = 'HSO-56661582013504';
    private static $username = 'almasshargh.com';
    private static $password = 'almasshargh.com';

    function __construct()
    {

    }

    static function getPrice(){


        $datas=[
            "username" => 'almasshargh.com',
            "password" => 'almasshargh.com',
            "shopkod" => 'HSO-56661582013504',
            "weight" => 200,
            "noehazine" => "نقد",
            "pricepost" => 11,
            "ostan" => 1,
            "city" => 1,
            "price" => 10000,
            "post_type"=>'tipax',
        ];

        $ch = curl_init(self::$base_url."requestprice".$datas['post_type']."new");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($datas)))
        );
        $res = (curl_exec($ch));

        curl_close($ch);

        $recived = json_decode($res, true);

        if(!empty($recived['vaz']) && $recived['vaz'] == 'true'){
            return $recived;
        }
        else
            return false;
    }



    public function orderstatus()
    {
        $datas=[
            "username" => 'almasshargh.com',
            "password" => 'almasshargh.com',
            "shopkod" => 'HSO-56661582013504',
            "code"=>123456,
        ];


        $ch = curl_init("http://api.zagma.ir/orderstatus");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($datas)))
        );
        $res = (curl_exec($ch));

        curl_close($ch);

        $recived = json_decode($res, true);

        if(!empty($recived['vaz']) && $recived['vaz'] == 'true'){
            return $recived;
        }
        else
            return false;
    }

    public function requestpricepostnew(){

        $datas=[
            "username" => 'almasshargh.com',
            "password" => 'almasshargh.com',
            "shopkod" => 'HSO-56661582013504',
            "weight" => 200,
            "noehazine" => "نقد",
            "ostan" => 1,
            "city" => 1,
            "price" => 10000,
            "pricepost" => 10,
        ];


        $ch = curl_init("http://api.zagma.ir/requestpricepostnew");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($datas)))
        );
        $res = (curl_exec($ch));

        curl_close($ch);

        $recived = json_decode($res, true);

        if(!empty($recived['vaz']) && $recived['vaz'] == 'true'){
            return $recived;
        }
        else
            return false;
    }

    public function orderwitharray(){
        $datas=[
            "username" => 'almasshargh.com',
            "password" => 'almasshargh.com',
            "shopkod" => 'HSO-56661582013504',
            "weight" => 200,
            "noehazine" => "نقد",
            "ostan" => 1,
            "city" => 1,
            "price" => 10000,
            "pricepost" => 10,
            "mobile"=> 910000000,
            "phone"=> 211111111,
            "pay"=>'done',
            "buyer"=>'ali',
            "adress"=>'Tehran',
            "codepos"=>1234567890,
            "email"=>'ali@gmail.com',
            "cart"=>array(
                "name"=>'ball',
                "price"=>20000,
            ),
        ];


        $ch = curl_init("http://api.zagma.ir/orderwitharray");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($datas)))
        );
        $res = (curl_exec($ch));

        curl_close($ch);

        $recived = json_decode($res, true);


        if(!empty($recived['vaz']) && $recived['vaz'] == 'true'){
            return $recived;
        }
        else
            return false;
    }

}


