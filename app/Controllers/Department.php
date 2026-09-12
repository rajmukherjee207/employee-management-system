<?php

namespace App\Controllers;

use App\Models\DepartmentModel;

class Department extends BaseController
{
    public function index()
    {
        $model = new DepartmentModel();

        $data['departments'] = $model
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('departments/list', $data);
    }

    public function create()
    {
        return view('departments/form');
    }

    public function store()
    {
        $name = trim($this->request->getPost('department_name'));

        if ($name === '') {
            return redirect()->back()
                ->with('error', 'Department name is required.');
        }

        $model = new DepartmentModel();

        $model->insert([
            'department_name' => $name
        ]);

        return redirect()->to('/departments')
            ->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $model = new DepartmentModel();

        $department = $model->find($id);

        if (!$department) {
            return redirect()->to('/departments');
        }

        return view('departments/form', [
            'department' => $department
        ]);
    }

    public function update($id)
    {
        $name = trim($this->request->getPost('department_name'));

        $model = new DepartmentModel();

        $model->update($id, [
            'department_name' => $name
        ]);

        return redirect()->to('/departments')
            ->with('success', 'Department updated successfully.');
    }

    public function delete($id)
    {
        $model = new DepartmentModel();

        $model->delete($id);

        return redirect()->to('/departments')
            ->with('success', 'Department deleted successfully.');
    }
}