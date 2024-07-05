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
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                        <h4>biodata donatur</h4>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="noTelp" name="noTelp" placeholder="Masukkan Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal Donasi</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal Donasi" required>
                        </div>
                        <hr>
                        <h4>Amil zakat yang dituju</h4>
                        <div class="form-group">
                            <label for="namaMasjid">Nama Masjid</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="namaMasjid" name="namaMasjid" placeholder="Masukkan Nama Masjid" required style="flex: 1;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rekening">Pilih Bank</label>
                            <select class="form-control" id="rekening" name="rekening">
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                            </select>
                            <label for="rekening">No Rekening</label>
                            <input type="text" class="form-control" id="rekening" name="rekening" value="1234-5678-9101-1121" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namaRekening">Nama Rekening </label>
                            <input type="text" class="form-control" id="namaRekening" name="namaRekening" value="Donasi Masjid" readonly>
                        </div>
                        <button type="submit" class="tomboldonasi">Donasi</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</section>

<?= $this->endSection(); ?>