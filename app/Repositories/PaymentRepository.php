<?php

namespace App\Repositories;

use App\Repositories\Contracts\PaymentRepositoryInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface {

	public function getAllMethods()
	{
        return [
            'paypal' => 'PayPal',
            'stripe' => 'Stripe',
            'cash' => 'Cash',
        ];
		//return Payment::all();
	}

	public function getPaymentById($id)
	{
		return Payment::findOrFail($id);
	}

	public function createPayment($data)
	{
        return Payment::create($data);
	}
}