<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="containerlogin">
    <div class="cardlogin">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Sebagai Pengurus</h1>
            </div>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif; ?>
            <form class="user" action="<?= base_url('/login/auth'); ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                    <input type="checkbox" onclick="togglePassword()"> Show Password
                </div>
                <script>
                    function togglePassword() {
                        var passwordField = document.getElementById("exampleInputPassword");
                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                        } else {
                            passwordField.type = "password";
                        }
                    }
                </script>
                <div class="tombollogin">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <hr>
            <div class="teksbawah-center">
                <a class="small" href="<?= base_url('/lupa-password'); ?>">Lupa Passord</a>
            </div>
            <div class="teksbawah-center">
                <a class="small" href="<?= base_url('/registrasi'); ?>">Ingin Mendaftar Akun</a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>