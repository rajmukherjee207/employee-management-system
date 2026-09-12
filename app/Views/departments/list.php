<?= $this->include('layouts/header') ?>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Departments</h2>

        <a href="<?= base_url('departments/create') ?>" class="btn btn-dark">
            + Add Department
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th width="80">#</th>
                            <th>Department Name</th>
                            <th width="200">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($departments)): ?>

                            <?php foreach ($departments as $department): ?>

                                <tr>
                                    <td><?= esc($department['id']) ?></td>

                                    <td>
                                        <?= esc($department['department_name']) ?>
                                    </td>

                                    <td>
                                        <a
                                            href="<?= base_url('departments/edit/' . $department['id']) ?>"
                                            class="btn btn-sm btn-primary"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= base_url('departments/delete/' . $department['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this department?')"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    No departments found.
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