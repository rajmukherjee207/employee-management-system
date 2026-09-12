<?= $this->include('layouts/header') ?>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h3 class="mb-4">
                        <?= isset($employee) ? 'Edit Employee' : 'Add Employee' ?>
                    </h3>

                    <form
                      id="employeeForm"
                      method="post"
                      action="<?= isset($employee)
                      ? base_url('employees/update/' . $employee['id'])
                      : base_url('employees/store') ?>"
                    >

                        <?= csrf_field() ?>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="<?= isset($employee) ? esc($employee['name']) : '' ?>"
                                    placeholder="Enter employee name"
                                    required
                                >

                                <div class="text-danger small mt-1" id="nameError">
    <?= session()->getFlashdata('validation_errors')['name'] ?? '' ?>
</div>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="<?= isset($employee) ? esc($employee['email']) : '' ?>"
                                    placeholder="Enter email"
                                    required
                                >

                                    <div class="text-danger small mt-1" id="emailError">
    <?= session()->getFlashdata('validation_errors')['email'] ?? '' ?>
</div>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile</label>

                                <input
                                    type="text"
                                    name="mobile"
                                    class="form-control"
                                    value="<?= isset($employee) ? esc($employee['mobile']) : '' ?>"
                                    placeholder="Enter mobile number"
                                    required
                                >

                                <div class="text-danger small mt-1" id="mobileError">
    <?= session()->getFlashdata('validation_errors')['mobile'] ?? '' ?>
</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>

                                <input
                                    type="date"
                                    name="dob"
                                    class="form-control"
                                    value="<?= isset($employee) ? esc($employee['dob']) : '' ?>"
                                    required
                                >

                                <div class="text-danger small mt-1" id="dobError">
    <?= session()->getFlashdata('validation_errors')['dob'] ?? '' ?>
</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>

                                <select
                                    name="department_id"
                                    class="form-select"
                                    required
                                >
                                <div class="text-danger small mt-1" id="departmentError">
    <?= session()->getFlashdata('validation_errors')['department_id'] ?? '' ?>
</div>
                                    <option value="">Select Department</option>

                                    <?php foreach ($departments as $department): ?>

                                        <option
                                            value="<?= esc($department['id']) ?>"
                                            <?= isset($employee) && $employee['department_id'] == $department['id'] ? 'selected' : '' ?>
                                        >
                                            <?= esc($department['department_name']) ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="col-md-6 mb-3 d-flex align-items-center">

                                <div class="form-check mt-4">

                                    <input
                                        type="checkbox"
                                        name="marital_status"
                                        value="Married"
                                        class="form-check-input"
                                        id="marital_status"
                                        <?= isset($employee) && $employee['marital_status'] === 'Married' ? 'checked' : '' ?>
                                    >

                                    <label
                                        class="form-check-label"
                                        for="marital_status"
                                    >
                                        Married
                                    </label>

                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn btn-dark">
                            <?= isset($employee) ? 'Update Employee' : 'Save Employee' ?>
                        </button>

                        <a
                            href="<?= base_url('employees') ?>"
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
<?php if (!isset($employee)): ?>
<script>
document.getElementById('employeeForm').addEventListener('submit', function(e) {

    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    document.getElementById('nameError').textContent = '';
document.getElementById('emailError').textContent = '';
document.getElementById('mobileError').textContent = '';
document.getElementById('dobError').textContent = '';
document.getElementById('departmentError').textContent = '';

    fetch("<?= base_url('employees/store') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        if (data.status) {

            alert(data.message);

            window.location.href = "<?= base_url('employees') ?>";

        } else {

    document.getElementById('nameError').textContent =
        data.errors.name || '';

    document.getElementById('emailError').textContent =
        data.errors.email || '';

    document.getElementById('mobileError').textContent =
        data.errors.mobile || '';

    document.getElementById('dobError').textContent =
        data.errors.dob || '';

    document.getElementById('departmentError').textContent =
        data.errors.department_id || '';

}

    })
    .catch(error => {

        console.error(error);

        alert('Something went wrong.');

    });

});
</script>
<?php endif; ?>