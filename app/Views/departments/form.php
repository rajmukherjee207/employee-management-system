<?= $this->include('layouts/header') ?>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h3 class="mb-4">
                        <?= isset($department) ? 'Edit Department' : 'Add Department' ?>
                    </h3>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form
                        method="post"
                        action="<?= isset($department)
                            ? base_url('departments/update/' . $department['id'])
                            : base_url('departments/store') ?>"
                    >

                        <?= csrf_field() ?>

                        <div class="mb-3">

                            <label class="form-label">
                                Department Name
                            </label>

                            <input
                                type="text"
                                name="department_name"
                                class="form-control"
                                placeholder="Enter department name"
                                value="<?= isset($department) ? esc($department['department_name']) : '' ?>"
                                required
                            >

                        </div>

                        <button type="submit" class="btn btn-dark">
                            <?= isset($department) ? 'Update Department' : 'Save Department' ?>
                        </button>

                        <a
                            href="<?= base_url('departments') ?>"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

<?= $this->include('layouts/footer') ?>