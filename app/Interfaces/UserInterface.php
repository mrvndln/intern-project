<?php

namespace App\Interfaces;

interface UserInterface{
    public function getAll();
    public function getRoles();
    public function add($data);
    public function update($data,$id);
    public function updateOrCreate($data);
    public function getModules();
    public function findModule($data);
    public function delete($id);
    public function find($data);
    public function getResults($data);
}