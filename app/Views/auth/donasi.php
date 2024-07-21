<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<section data-bs-version="5.1" class="form5 cid-ubOSVY3BE5" id="form02-3">

    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-1">
                        <strong>Donasi</strong>
                    </h3>

                </div>
            </div>
        </div>

    </div>

    <section class="donasi-form">
        <div class="containerdonasi">

                <div class="card-body">
                    <form action="<?= base_url('/donasi-store'); ?>" method="post" enctype="multipart/form-data">
                        <h4>Formulir Donasi</h4>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap atau Nama Organisasi</label>
                            <input type="text" class="form-control" id="nama" name="nama_donatur" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="noTelp" name="ho_telp" placeholder="Masukkan Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_donasi">Jenis Donasi</label>
                            <select class="form-control" id="jenis_donasi" name="jenis_donasi">
                                <option value="pembangunan">Pembangunan</option>
                                <option value="infak_anak_yatim">Infak Anak Yatim</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal Donasi</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal Donasi" required>
                        </div>
                        <div class="form-group">
                            <label for="bukti_donasi">Upload Bukti transfer JPG</label>
                            <input type="file" class="form-control" id="bukti_donasi" name="bukti_transfer" required>
                        </div>
                        <hr>

                        <input type="hidden" name="id_masjid" value="<?= $masjid['id']; ?>">

                        <h4>Rekening Masjid Yang Di Tuju :</h4>
                        <div class="form-group">
                            <label for="rekening">Nama Rekening</label>
                            <input type="text" class="form-control" id="bank" name="bank" value="<?= $masjid['nama_masjid'] ?>" readonly disabled>
                        </div>
                        <div class="form-group">
                            <label for="rekening">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" value="<?= $masjid['nama_bank'] ?>" readonly disabled>
                            <label for="rekening">No Rekening</label>
                            <input type="text" class="form-control" id="rekening" name="rekening" value="<?= $masjid['no_rekening'] ?>" readonly disabled>
                        </div>
                        <button type="submit" class="tomboldonasi">Donasi</button>
                        <div class="teksbawah-center">
                            <a class="small" href="<?= base_url('/donasi-zakat/' . $masjid['id']); ?>">Ingin Donasi Zakat</a>
                        </div>
                    </form>
                </div>

        </div>

    </section>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
           });
</script>

<?= $this->endSection(); ?>