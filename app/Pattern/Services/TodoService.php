<?php

namespace App\Pattern\Services;

use App\Pattern\Repositories\TodoRepository;

class TodoService
{
	private TodoRepository $todoRepository;

	public function __construct()
	{
		$this->todoRepository = new TodoRepository();
	}

	public function getTasks()
	{
		$todolist = $this->todoRepository->getAll();
		return $todolist;
	}

	public function addTask(array $data)
	{
		$todoId = $this->todoRepository->create($data);
		return $todoId;
	}

	public function getById(string $id)
	{
		$todolist = $this->todoRepository->getById($id);
		return $todolist;
	}

	public function updateTodo(array $data, $idTodo)
	{
		$id = $this->todoRepository->save($data, $idTodo);
		return $id;
	}

	public function deleteTodo($todoId)
	{
		$todo = $this->todoRepository->delete($todoId);
		return $todo;
	}
}
