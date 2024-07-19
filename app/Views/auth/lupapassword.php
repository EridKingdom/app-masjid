<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="containerlogin">
    <div class="cardlogin">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Masukkan username dan email</h1>
            </div>
            <form class="user" action="/lupa-password/submit" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="email">
                </div>
                <div class="tombollogin">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
            <hr>
            <div class="teksbawah-center">
                <a class="small" href="<?= base_url('/login'); ?>">Kembali login</a>
            </div>
            <div class="teksbawah-center">
                <a class="small" href="<?= base_url('/registrasi'); ?>">Ingin Mendaftar Akun</a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>