<?php

namespace App\Interfaces;

interface PatientInterface{
    public function getAll();
    public function add($data);
    public function find($id);
    public function update($data,$id);
    public function getResults($data);
    public function totalPatients();
    public function activePatients();
}