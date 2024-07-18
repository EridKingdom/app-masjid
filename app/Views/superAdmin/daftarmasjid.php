<?= $this->extend('layout/supertemplate'); ?>
<?= $this->section('content'); ?>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">

    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-12">
                <div class="container">
                    <div class="table-responsive">
                        <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-1">
                            <strong style="color: black;">Data Masjid</strong>
                        </h4>
                        <hr>
                        <div class="d-flex justify-content-end mb-3">
                            <button id="blockButton" class="btn btn-danger">Blokir Akun</button>
                        </div>
                        <table class="table" id="masjidTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Masjid</th>
                                    <th>Provinsi</th>
                                    <th>Kota/Kab</th>
                                    <th>Alamat Masjid</th>
                                    <th>Status</th> <!-- New Status Column -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($db_data_masjid as $k) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="selectItem"></td> <!-- Checkbox for each item -->
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/<?= $k['sampul']; ?>" alt="Gambar tidak ditemukan" class="sampul"></td>
                                        <td><?= $k['nama_masjid']; ?></td>
                                        <td><?= $k['provinsi']; ?></td>
                                        <td><?= $k['kota_kab']; ?></td>
                                        <td><?= $k['alamat_masjid']; ?></td>
                                        <td><?= isset($k['status']) ? $k['status'] : 'N/A'; ?></td> <!-- Display Status -->
                                        <td>
                                            <a href="<?= base_url('/profil-super/' . $k['id']); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
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

        // Select all functionality
        const selectAllCheckbox = document.getElementById('selectAll');
        const itemCheckboxes = document.querySelectorAll('.selectItem');

        selectAllCheckbox.addEventListener('change', function() {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script>

<?= $this->endSection(); ?>