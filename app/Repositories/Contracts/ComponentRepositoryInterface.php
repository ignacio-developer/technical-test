<?php
namespace App\Repositories\Contracts;

interface ComponentRepositoryInterface() {
	
	public function all();
	public function findById($id);
	public function store(array $data);
	public function update($id, array $data);
	public function delete($id);
}