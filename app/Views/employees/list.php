<?= $this->include('layouts/header') ?>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Employees</h2>

        <a href="<?= base_url('employees/create') ?>" class="btn btn-dark">
            + Add Employee
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>DOB</th>
                            <th>Marital Status</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($employees)): ?>

                            <?php foreach ($employees as $employee): ?>

                                <tr>
                                    <td><?= esc($employee['id']) ?></td>

                                    <td><?= esc($employee['name']) ?></td>

                                    <td><?= esc($employee['email']) ?></td>

                                    <td><?= esc($employee['mobile']) ?></td>

                                    <td><?= esc($employee['dob']) ?></td>

                                    <td><?= esc($employee['marital_status']) ?></td>

                                    <td><?= esc($employee['department_name']) ?></td>

                                    <td>
                                        <a
                                            href="<?= base_url('employees/edit/' . $employee['id']) ?>"
                                            class="btn btn-sm btn-primary"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= base_url('employees/delete/' . $employee['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this employee?')"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    No employees found.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

<?= $this->include('layouts/footer') ?>