<?php

namespace App\Http\Controllers\Payment;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\Controllers\Controller;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway) //**for passing dependency parameters to PaymentGateway
{                                                                                     // in injection type we must use {{-register-}} method in
        $order = $orderDetails->all();                                                // app\AppServiceProvider **
        dd($paymentGateway->charge(2500));
    }
}
