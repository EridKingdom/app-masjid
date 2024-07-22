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
                <form id="donasiZakatForm" action="<?= base_url('/donasi-zakat-store'); ?>" method="post" enctype="multipart/form-data">
                    <h4>Formulir Donasi Zakat</h4>
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
                        <label for="jenis_donasi">Jenis Beras</label>
                        <select class="form-control" id="jenis_beras" name="id_beras">
                            '
                            <option>- Pilih Jenis Beras -</option>
                            '
                            <?php
                            foreach ($beras as $b) {
                                echo '<option value=' . $b['id_beras'] . '>' . $b['jenis_beras'] . '</option>';
                            }
                            ?>
                            ?>
                        </select>
                    </div>
                    <input type="hidden" value="<?= $masjid['id'] ?>" name="id_masjid">
                    <div class="form-group">
                        <label for="nominal">Nominal Donasi</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Nominal Donasi" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="bukti_donasi">Upload Bukti Donasi (JPG, PNG)</label>
                        <input type="file" class="form-control" id="bukti_donasi" name="bukti_transfer" required>
                    </div>
                    <hr>
                    <h4>Amil Zakat :</h4>
                    <div class="form-group">
                        <label for="masjid">Nama Rekening</label>
                        <input type="text" class="form-control" id="nama_masjid" name="masjid" value="<?= $masjid['nama_masjid'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="rekening">Bank</label>
                        <input type="text" class="form-control" id="bank" name="bank" value="<?= $masjid['nama_bank'] ?>" readonly disabled>
                        <label for="rekening">No Rekening</label>
                        <input type="text" class="form-control" id="rekening" name="rekening" value="<?= $masjid['no_rekening'] ?>" readonly disabled>
                    </div>
                    <button type="submit" class="tomboldonasi">Donasi</button>
                    <div class="teksbawah-center">
                        <a class="small" href="<?= base_url('/donasi'); ?>">Ingin Donasi Pembangunan/Anak Yatim</a>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var berasOption = document.getElementById('jenis_beras');
                        var data = JSON.parse(`<?= json_encode($beras) ?>`)
                        console.log(data);

                        berasOption.addEventListener("change", function(event) {
                            let id = event.target.value;
                            let selected = data.find((d) => d.id_beras == id);
                            const nominal = document.getElementById('nominal');
                            if (selected) {
                                nominal.value = selected.harga * 3;

                            } else {
                                nominal.value = "";
                            }
                        });

                        document.getElementById('donasiZakatForm').addEventListener('submit', function(event) {
                            event.preventDefault();
                            if (confirm('Donasi Berhasil! Klik OK untuk melanjutkan.')) {
                                this.submit();
                            }
                        });
                    });
                </script>
            </div>

        </div>
    </section>
</section>

<?= $this->endSection(); ?>