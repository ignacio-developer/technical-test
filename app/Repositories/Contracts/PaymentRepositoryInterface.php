<?php

namespace App\Repositories\Contracts;

interface PaymentRepositoryInterface {

	public function getAllMethods();
	public function getPaymentById($id);
	public function createPayment(array $data);

}