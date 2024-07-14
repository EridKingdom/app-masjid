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
                    <form action="<?= base_url('/donasi-store'); ?>" method="post">
                        <h4>biodata donatur</h4>
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
                            <label for="nominal">Nominal Donasi</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal Donasi" required>
                        </div>
                        <hr>
                        <h4>Amil zakat yang dituju</h4>
                        <div class="form-group">
                            <label for="masjid">Pilih Masjid</label>
                            <input list="encodings" value="" class="form-control custom-select custom-select-sm" id="nama_masjid" , name="masjid">
                            <datalist id="encodings">
                                <?php for ($i = 0; $i < count($masjidOptions); $i++) {
                                    echo "<option value='" . $masjidOptions[$i]['nama_masjid'] . "'>" . $masjidOptions[$i]['id'] . "</option>";
                                }
                                ?>
                            </datalist>
                            <input hidden type="text" name="id_masjid" , id="id_masjid">
                        </div>
                        <div class="form-group">
                            <label for="rekening">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" value="" readonly disabled>
                            <label for="rekening">No Rekening</label>
                            <input type="text" class="form-control" id="rekening" name="rekening" value="" readonly disabled>
                        </div>
                        <button type="submit" class="tomboldonasi">Donasi</button>
                        <div class="teksbawah-center">
                            <a class="small" href="<?= base_url('/bukti-donasi'); ?>">Ingin Upload Bukti Transaksi</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var masjid = new Array();
        <?php foreach ($masjidList as $k => $v) { ?>
            var value = new Array();
            <?php foreach ($v as $i => $j) { ?>
                value['<?php echo esc($i); ?>'] = '<?php echo esc($j); ?>';
            <?php } ?>
            masjid.push(value);
        <?php } ?>
        var masjidName = document.getElementById('nama_masjid');
        masjidName.addEventListener("change", function(value) {
            var bank = document.getElementById('bank');
            var rek = document.getElementById('rekening');
            var idMasjid = document.getElementById('id_masjid');
            var selectedMasjid;
            masjid.forEach(function(item, index) {
                if (item['nama_masjid'] == value.target.value) {
                    selectedMasjid = item;
                }
            });
            bank.setAttribute('value', selectedMasjid['nama_bank']);
            rek.setAttribute('value', selectedMasjid['no_rekening']);
            idMasjid.setAttribute('value', selectedMasjid['id']);
        });
    });
</script>

<?= $this->endSection(); ?>