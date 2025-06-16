<?php

namespace App\Repositories;

use App\Interfaces\PatientInterface;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;



class PatientRepository implements PatientInterface
{
    public function getAll()
    {
        return DB::table('patients')
            ->where('is_active', 1)
            ->get();
    }

    public function find($id)
    {
        $patient = Patient::find($id);
        return $patient;
    }

    public function getResults($data)
    {
        $patient = DB::table('patients')
            ->where('is_active', '=', 1)
            ->where(function (Builder $query) use ($data) {
                $query->whereAny(['name', 'email', 'gender', 'contact_number', 'birth_date', 'address'], 'LIKE', $data . '%');
            })->get();
        return $patient;
    }

    public function add($data)
    {
        try {
            $patient = Patient::create([
                'name' => $data['patient_name'],
                'gender' => $data['patient_gender'],
                'birth_date' => $data['patient_birthdate'],
                'contact_number' => $data['patient_contact'],
                'email' => $data['patient_email'],
                'address' => $data['patient_address']
            ]);

            return $patient;
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }

    public function update($data, $id)
    {
        try {
            $patient = Patient::find($id);

            $patient->name = $data['patient_name'];
            $patient->email = $data['patient_email'];
            $patient->address = $data['patient_address'];
            $patient->birth_date = $data['patient_birthdate'];
            $patient->gender = $data['patient_gender'];
            $patient->contact_number = $data['patient_contact'];

            $patient->save();


            return $patient;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $patient = Patient::find($id);
            if ($patient) {
                $patient->delete();
            }
            return $patient;
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function totalPatients()
    {
        $totalPatients = DB::table('patients')->count();
        return $totalPatients;
    }

    public function activePatients()
    {
        $activePatients = DB::table('patients')->where('is_active', 1)->count();
        return $activePatients;
    }
}
