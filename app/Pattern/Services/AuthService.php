<?php

namespace App\Pattern\Services;

use App\Pattern\Repositories\AuthRepository;

class AuthService
{
	private AuthRepository $authRepository;

	public function __construct()
	{
		$this->authRepository = new AuthRepository();
	}
}
