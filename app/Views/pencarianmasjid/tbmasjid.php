<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section data-bs-version="5.1" class="form5 cid-ubOSVY3BE5" id="form02-3">

    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <div class="cardsearch">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="inputNamaMasjid" placeholder="Nama Masjid/Musholla">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="provinsi" placeholder="Provinsi">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="kota" placeholder="Kota">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="button" id="searchButton" class="btn btn-primary btn-user btn-block">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-1">
                        <strong>Daftar Masjid</strong>
                    </h3>

                </div>
            </div>
        </div>

    </div>
</section>
<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">

    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-12">
                <div class="container">
                    <div class="table-responsive">
                        <h4 class="judultabel">
                            <strong>Daftar Masjid</strong>
                        </h4>
                        <table class="table" id="masjidTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Masjid</th>
                                    <th>Provinsi</th>
                                    <th>Kota/Kab</th>
                                    <th>Alamat Masjid</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($db_data_masjid as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/<?= $k['sampul']; ?>" alt="Gambar tidak ditemukan" class="sampul"></td>
                                        <td><?= $k['nama_masjid']; ?></td>
                                        <td><?= $k['provinsi']; ?></td>
                                        <td><?= $k['kota_kab']; ?></td>
                                        <td><?= $k['alamat_masjid']; ?></td>
                                        <td>
                                            <a href="<?= base_url('/profil/' . $k['id']); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <!-- SLUG NYA ERROR GIMANA MAU LANJUT <a href="/TbMasjid/?= $k['slug']; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchButton = document.getElementById('searchButton');
        const provinsiInput = document.getElementById('provinsi');
        const kotaInput = document.getElementById('kota');
        const table = document.getElementById('masjidTable');
        const rows = table.getElementsByTagName('tr');

        searchButton.addEventListener('click', function() {
            const provinsiTerm = provinsiInput.value.toLowerCase();
            const kotaTerm = kotaInput.value.toLowerCase();
            Array.from(rows).forEach(row => {
                let provinsiFound = false;
                let kotaFound = false;
                Array.from(row.cells).forEach(cell => {
                    if (cell.textContent.toLowerCase().indexOf(provinsiTerm) > -1) {
                        provinsiFound = true;
                    }
                    if (cell.textContent.toLowerCase().indexOf(kotaTerm) > -1) {
                        kotaFound = true;
                    }
                });
                row.style.display = (provinsiFound && kotaFound) ? '' : 'none';
            });
        });
    });
</script>

<?= $this->endSection(); ?>