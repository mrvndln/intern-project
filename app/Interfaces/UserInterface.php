<?php

namespace App\Interfaces;

interface UserInterface{
    public function getAll();
    public function add($data);
    public function update($data,$id);
    public function delete($id);
    public function find($data);
}