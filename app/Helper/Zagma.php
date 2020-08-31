<?php
namespace App\Helpers;

class Zagma
{

    private static $base_url = "http://api.zagma.ir/";
    private static $shopkod = 'HSO-56661582013504';
    private static $username = 'test';
    private static $password = 654321;

    function __construct()
    {

    }

    static function getPrice($data_post){

// guide:
//shopkod	کد فروشگاه ثبت شده در زاگما	الزامی
//weight	وزن کالا به گرم	الزامی
//ostan	کد استان (طبق لیست پیوست STATE_CODE )	الزامی
//city	کد شهرستان (طبق لیست پیوست CODE )	الزامی
//noehazine	نوع محاسبه هزینه :
//ثابت [ارسال رایگان] (از خریدار تنها مبلغ کالا دریافت میگردد)
//شناور (از خریدار قیمت کالا+هزینه خدمات+هزینه پستی دریافت میگردد)
//مشمول (از خریدار قیمت کالا + هزینه پستی دریافت میگردد)
//کرایه ثابت [هزینه ارسال دلخواه] (از خریدار قیمت کالا + کرایه وارد شده دریافت میگردد)
//الزامی
//pricepost	قیمت برای کرایه ثابت [کرایه وارد شده] پستی(تومان)	الزامی در صورتی که
//noehazine برابر 4 باشد
//price	قیمت کل سبد خرید به تومان	الزامی




        //post_types:
        // post
        // nedex
        // tipax



        //price_types:
        //1        ثابت [ارسال رایگان] (از خریدار تنها مبلغ کالا دریافت میگردد)
        //2    شناور (از خریدار قیمت کالا+هزینه خدمات+هزینه پستی دریافت میگردد)
        //3              مشمول (از خریدار قیمت کالا + هزینه پستی دریافت میگردد)
        //4  کرایه ثابت [هزینه ارسال دلخواه] (از خریدار قیمت کالا + کرایه وارد شده دریافت میگردد)

        $datas = array (
            "username" => self::$username,
            "password" => self::$password,
            "shopkod" => self::$shopkod,
            "weight" => $data_post['weight'],
            "noehazine" => $data_post['price_type'],
            "pricepost" => null,
            "ostan" => $data_post['province'],
            "city" => $data_post['city'],
            "price" => $data_post['price'],
        );

        $ch = curl_init(self::$base_url."requestprice".$data_post['post_type']."new");
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
}
