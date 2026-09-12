<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'mobile',
        'dob',
        'marital_status',
        'department_id'
    ];

    protected $useTimestamps = true;
}