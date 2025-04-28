<?php

namespace App\Traits;

use App\Interfaces\UserInterface;

trait BootUserRepository
{
    public function boot(UserInterface $repository) {
        $this->repository = $repository;
    }
}