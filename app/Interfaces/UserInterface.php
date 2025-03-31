<?php

namespace App\Interfaces;

interface UserInterface{
    public function getAll();
    public function add($data);
    public function find($data);
}