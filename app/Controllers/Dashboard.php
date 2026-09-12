<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DepartmentModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $employeeModel = new EmployeeModel();
        $departmentModel = new DepartmentModel();

        $data = [
            'employeeCount'   => $employeeModel->countAll(),
            'departmentCount' => $departmentModel->countAll()
        ];

        return view('dashboard', $data);
    }
}