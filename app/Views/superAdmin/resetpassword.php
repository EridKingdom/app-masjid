<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo-app-128x152.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap">
    </noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="<?= base_url(); ?>/assets/mobirise/css/mbr-additional.css?v=N4qxfg">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/mobirise/css/mbr-additional.css?v=N4qxfg" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
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
                                <button type="submit" class="btn btn-secondary btn-block">Simpan</button>
                            </div>
                        </form>
                        <hr>
                        <div class="teksbawah-center">
                            <a class="small" href="<?= base_url('/login'); ?>">Kembali login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
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