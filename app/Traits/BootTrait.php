<?php

namespace App\Traits;

use App\Interfaces\PatientInterface;
use App\Interfaces\UserInterface;

trait BootTrait
{
    public function boot(UserInterface $user_repo, PatientInterface $patient_repo) {
        $this->user_repo = $user_repo;
        $this->patient_repo = $patient_repo;
    }
}