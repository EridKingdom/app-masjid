<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="<?= base_url('public/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                </div>
                <form class="user" action="" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user mb-3" id="exampleInputPassword" name="password" placeholder="Password">
                        <input type="password" class="form-control form-control-user mb-3" id="exampleInputPassword" name="confirm_password" placeholder="Konfirmasi Password">
                        <input type="checkbox" onclick="togglePassword()"> Show Password
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('/login'); ?>">Kembali login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('public/assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        function togglePassword() {
            var passwordFields = document.querySelectorAll('input[type="password"]');
            passwordFields.forEach(field => {
                if (field.type === "password") {
                    field.type = "text";
                } else {
                    field.type = "password";
                }
            });
        }
    </script>
</body>

</html>