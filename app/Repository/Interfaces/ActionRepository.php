<?php
namespace App\Repository\Interfaces;

interface ActionRepository
{
	public function getAll($where = []);

	public function getById($id);

	public function create(array $attributes);
	
	public function update($id, array $attributes);

	public function delete($id);

	public function with($model);
}