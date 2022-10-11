<?php

namespace App\Pattern\Repositories;

use App\Models\todoApps;

class TodoRepository
{
	private todoApps $todolist;

	public function __construct()
	{
		$this->todolist = new todoApps();
	}

	public function getAll()
	{
		$todolist = $this->todolist->get([]);
		return $todolist;
	}

	public function getById(string $id)
	{
		$id = $this->todolist->find(['_id' => $id])->first();
		return $id;
	}

	public function create(array $data)
	{
		$data = [
			'title'       => $data['title'],
			'description' => $data['description'],
			'assigned'    => $data['assigned'],
		];

		$dataSaved = $this->todolist->create($data);
		return $dataSaved->id;
	}

	public function save(array $data, $idTodo)
	{
		$data = [
			'title'       => $data['title'],
			'description' => $data['description'],
			'assigned'    => $data['assigned'],
		];

		$id = $this->getById($idTodo);
		$id->update($data);
		return $id;
	}

	public function delete($todoId)
	{
		$id = $this->getById($todoId);
		$id->delete();
		return $id;
	}
}
