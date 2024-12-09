<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class CheckoutController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService) 
    {
        $this->paymentService = $paymentService;
    }

    public function checkout()
    {
        $data = $this->paymentService->getCheckoutMethods();
        return response()->json([
            'message' => 'Checkout data fetched successfully',
            'data' => $data,
        ]);
    }

}
