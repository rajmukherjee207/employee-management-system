<?= $this->include('layouts/header') ?>

<div class="container py-5">

```
<h2>Dashboard</h2>

<p class="text-muted">
    Welcome, <?= esc(session()->get('user_id')) ?>
</p>

<!-- Quick Actions -->
<div class="mb-4">

    <a href="<?= base_url('employees/create') ?>" class="btn btn-dark me-2">
        + Add Employee
    </a>

    <a href="<?= base_url('departments/create') ?>" class="btn btn-secondary">
        + Add Department
    </a>

</div>


<!-- Dashboard Cards -->
<div class="row g-4">

    <!-- Employees -->
    <div class="col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <h5 class="text-muted">
                    Total Employees
                </h5>

                <h1 class="display-5 fw-bold">
                    <?= esc($employeeCount) ?>
                </h1>

                <p class="text-muted">
                    Total employees registered in the system.
                </p>

                <a href="<?= base_url('employees') ?>"
                   class="btn btn-dark">
                    Manage Employees
                </a>

            </div>

        </div>

    </div>


    <!-- Departments -->
    <div class="col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <h5 class="text-muted">
                    Total Departments
                </h5>

                <h1 class="display-5 fw-bold">
                    <?= esc($departmentCount) ?>
                </h1>

                <p class="text-muted">
                    Total departments available in the system.
                </p>

                <a href="<?= base_url('departments') ?>"
                   class="btn btn-dark">
                    Manage Departments
                </a>

            </div>

        </div>

    </div>

</div>
```

</div>

<?= $this->include('layouts/footer') ?>
