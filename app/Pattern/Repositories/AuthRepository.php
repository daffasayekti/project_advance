<?php

namespace App\Pattern\Repositories;

use App\Models\User;

class AuthRepository
{
	private User $user;

	public function __construct()
	{
		$this->user = new User();
	}
}
