<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
            Employee Management
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('employees') ?>">
                        Employees
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('departments') ?>">
                        Departments
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-warning" href="<?= base_url('logout') ?>">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>