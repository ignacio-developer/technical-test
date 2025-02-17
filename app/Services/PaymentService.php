<?php

namespace App\Services;
use App\Repositories\Contracts\PaymentRepositoryInterface;

class PaymentService {

	protected $paymentRepository;

	public function __construct(PaymentRepositoryInterface $paymentRepository)
	{
		$this->paymentRepository = $paymentRepository;
	}

	public function getCheckoutMethods()
	{
		return [
            'payment_methods' => $this->paymentRepository->getAllMethods(),
        ];
	}

    public function processPayment(array $data): array
    {
        // Simulate payment processing
        $paymentStatus = $this->charge($data['payment_method'], $data['amount']);

        // Save the payment details
        $payment = $this->paymentRepository->createPayment([
            'user_id' => $data['user_id'],
            'payment_method' => $data['payment_method'],
            'amount' => $data['amount'],
            'status' => $paymentStatus ? 'success' : 'failed',
        ]);

        return [
            'status' => $paymentStatus ? 'success' : 'failed',
            'payment' => $payment,
        ];
    }

    public function charge($method, $amount): bool
    {	
    	//Make 3rd party request (Paypal, Stripe)
    	return true;
    }

}