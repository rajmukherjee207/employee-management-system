<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DepartmentModel;

class Employee extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel();

        $data['employees'] = $model
            ->select('employees.*, departments.department_name')
            ->join('departments', 'departments.id = employees.department_id')
            ->orderBy('employees.id', 'DESC')
            ->findAll();

        return view('employees/list', $data);
    }

    public function create()
    {
        $departmentModel = new DepartmentModel();

        $data['departments'] = $departmentModel
            ->orderBy('department_name', 'ASC')
            ->findAll();

        return view('employees/form', $data);
    }

    public function store()
    {
        $employeeModel = new EmployeeModel();

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[employees.email]',
            'mobile' => 'required|min_length[10]|max_length[15]',
            'dob' => 'required',
            'department_id' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $maritalStatus = $this->request->getPost('marital_status')
            ? 'Married'
            : 'Unmarried';

        $data = [
            'name' => trim($this->request->getPost('name')),
            'email' => trim($this->request->getPost('email')),
            'mobile' => trim($this->request->getPost('mobile')),
            'dob' => $this->request->getPost('dob'),
            'marital_status' => $maritalStatus,
            'department_id' => $this->request->getPost('department_id')
        ];

        if ($employeeModel->insert($data)) {

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Employee created successfully.'
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Failed to create employee.'
        ]);
    }
    public function edit($id)
    {
        $employeeModel = new EmployeeModel();
        $departmentModel = new DepartmentModel();

        $employee = $employeeModel->find($id);

        if (!$employee) {
            return redirect()->to('/employees');
        }

        $data['employee'] = $employee;

        $data['departments'] = $departmentModel
            ->orderBy('department_name', 'ASC')
            ->findAll();

        return view('employees/form', $data);
    }

    public function update($id)
    {
        $employeeModel = new EmployeeModel();

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email',
            'mobile' => 'required|min_length[10]|max_length[15]',
            'dob' => 'required',
            'department_id' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('validation_errors', $validation->getErrors());
        }

        $maritalStatus = $this->request->getPost('marital_status')
            ? 'Married'
            : 'Unmarried';

        $data = [
            'name' => trim($this->request->getPost('name')),
            'email' => trim($this->request->getPost('email')),
            'mobile' => trim($this->request->getPost('mobile')),
            'dob' => $this->request->getPost('dob'),
            'marital_status' => $maritalStatus,
            'department_id' => $this->request->getPost('department_id')
        ];

        $employeeModel->update($id, $data);

        return redirect()->to('/employees')
            ->with('success', 'Employee updated successfully.');
    }

    public function delete($id)
    {
        $employeeModel = new EmployeeModel();

        $employeeModel->delete($id);

        return redirect()->to('/employees')
            ->with('success', 'Employee deleted successfully.');
    }
}