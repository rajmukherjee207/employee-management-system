<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h3 class="text-center mb-2">Admin Login</h3>

                    <p class="text-center text-muted mb-4">
                        Employee Management System
                    </p>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('login') ?>">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">User ID</label>

                            <input
                                type="text"
                                name="user_id"
                                class="form-control"
                                placeholder="Enter User ID"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter Password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>