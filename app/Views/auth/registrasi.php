<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="containerregister">

    <div class="formregis">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrasi akun masjid</h1>
            </div>
            <form class="user" method="post" action="<?= base_url('/login/registrasi'); ?>" enctype="multipart/form-data" id="registrationForm">
                <div class="form-group row">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_masjid" placeholder="Nama Masjid/Musholla">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_pengurus" placeholder="Nama Ketua Pengurus">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="no_telp" placeholder="No Telp Pengurus">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-user" name="alamat_pengurus" placeholder="Alamat Pengurus"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat Masjid"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="provinsi" placeholder="Provinsi">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="kota" placeholder="Kota">
                    </div>
                </div>
                <hr>
                <div class="pilihan">
                    <p for="inputTakmirPdf">Jenis Tipologi :</p>
                    <select class="pilihanabc" name="jenis_tipologi">
                        <option value="musholla">Musholla</option>
                        <option value="masjid">Masjid</option>
                        <option value="masjid_agung">Masjid Agung</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="form-group">
                        <p for="inputTakmirPdf">Tahun Berdiri :</p>
                        <input type="date" class="form-control form-control-user" name="tahun_berdiri" placeholder="Tanggal Berdiri">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="luas_tanah" placeholder="Luas Tanah">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="luas_bangunan" placeholder="Luas Bangunan">
                    </div>
                </div>
                <hr>
                <div class="masukanfile">
                    <p for="inputTakmirPdf">Upload Surat Takmir PDF</p>
                    <input type="file" class="form-control-file" id="inputTakmirPdf" name="surat_takmir[]">
                </div>
                <div class="masukanfile">
                    <p for="inputTakmirPdf">Upload Sertifikat PDF</p>
                    <input type="file" class="form-control-file" id="inputSertifikat" name="sertifikat[]">
                </div>
                <div class="masukangambar">
                    <p for="inputTakmirPdf">Upload KTP Pengurus JPG</p>
                    <input type="file" class="form-control-file" id="inputGambarKtp" name="gambar_ktp[]">
                </div>
                <div class="masukangambar">
                    <p for="inputTakmirPdf">Upload profil JPG</p>
                    <input type="file" class="form-control-file" id="sampul" name="sampul[]">
                </div>
                <div class="masukangambar">
                    <p for="inputTakmirPdf">Upload Gambar 1 JPG</p>
                    <input type="file" class="form-control-file" id="inputGambar1" name="gambar1[]">
                </div>
                <div class="masukangambar">
                    <p for="inputTakmirPdf">Upload Gambar 2 JPG</p>
                    <input type="file" class="form-control-file" id="inputGambar2" name="gambar2[]">
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>
                <div class="tomboldaftar">
                    <button type="submit" class="btn btn-primary btn-user btn-block" onclick="return validateForm()">Daftarkan</button>
                </div>
            </form>
            <hr>
            <div class="teksbawah-center">
                <a class="small" href="forgot-password.html">Lupa Password?</a>
            </div>
            <div class="teksbawah-center">
                <a class="small" href="<?= base_url('/login'); ?>">Sudah Daftar</a>
            </div>
        </div>
    </div>

</div>

<script>
function validateForm() {
    const form = document.getElementById('registrationForm');
    const inputs = form.querySelectorAll('input, textarea, select');
    for (let input of inputs) {
        if (input.value.trim() === '') {
            alert('Silahkan isi semua formulir.');
            input.focus();
            return false;
        }
    }
    return true;
}
</script>

<?= $this->endSection(); ?>