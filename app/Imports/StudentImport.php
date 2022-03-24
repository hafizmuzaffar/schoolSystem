<?php

namespace App\Imports;

use App\Models\SchoolClass;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'student_number'    => $row[0],
            'name'              => $row[1],
            'address'           => $row[2],
            'email'             => $row[3],
            'phone_number'      => $row[4],
            'school_class_id'   => SchoolClass::firstWhere('class_name', $row[5])->id
        ]);
    }
}
