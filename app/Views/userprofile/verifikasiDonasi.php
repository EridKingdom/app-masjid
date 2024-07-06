<?= $this->extend('layout/admintemplate'); ?>
<?= $this->Section('content'); ?>



<section data-bs-version="5.1" class="slider3 cid-ueOcGCqmku" id="slider03-1o">

    <div class="carousel slide" id="ueOkfUJH6x" data-interval="5000" data-bs-interval="5000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Mengambil data user dari session
                $session = session();
                $userData = $session->get('user_data');
                $id_user = $userData['id_user'] ?? null;

                // Fetch the masjid data from the database
                $masjid = [];
                if ($id_user) {
                    $db = \Config\Database::connect();
                    $query = $db->query("SELECT nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3 FROM db_data_masjid WHERE id_user = ?", [$id_user]);
                    $result = $query->getRowArray();
                    if ($result) {
                        $masjid = $result;
                    } else {
                        echo "No data found for the given user ID.";
                    }
                } else {
                    echo "User ID not found in session.";
                }

                // Determine if there are images to display
                $hasImages = !empty($masjid['gambar1']) || !empty($masjid['gambar2']) || !empty($masjid['gambar3']);
                ?>
                <div class="carousel-inner">
                    <?php if ($hasImages) : ?>
                        <div class="carousel-item active">
                            <div class="item-wrapper">
                                <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar1'])); ?>" alt="First Image">
                            </div>
                        </div>
                        <?php if (!empty($masjid['gambar2'])) : ?>
                            <div class="carousel-item">
                                <div class="item-wrapper">
                                    <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar2'])); ?>" alt="Second Image">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($masjid['gambar3'])) : ?>
                            <div class="carousel-item">
                                <div class="item-wrapper">
                                    <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar3'])); ?>" alt="Third Image">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                            <p>No images available.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" data-bs-slide="prev" href="#ueOkfUJH6x">
            <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
            <span class="sr-only visually-hidden">Previous</span>
        </a>
        <a class="carousel-control carousel-control-next" role="button" data-slide="next" data-bs-slide="next" href="#ueOkfUJH6x">
            <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
            <span class="sr-only visually-hidden">Next</span>
        </a>
    </div>
</section>

<?php
// Mengambil data user dari session
$session = session();
$userData = $session->get('user_data');
$id_user = $userData['id_user'] ?? null;

// Fetch the masjid data from the database
$masjid = [];
if ($id_user) {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT nama_masjid, deskripsi, alamat_masjid FROM db_data_masjid WHERE id_user = ?", [$id_user]);
    $result = $query->getRowArray();
    if ($result) {
        $masjid = $result;
    }
}
?>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        <strong><?= esc($masjid['nama_masjid']); ?></strong>
                    </h5>
                    <p class="mbr-section-text mbr-fonts-style mb-4 display-7">
                        <?= esc($masjid['deskripsi']); ?>
                    </p>
                    <p class="mbr-text mbr-fonts-style display-7"><?= esc($masjid['alamat_masjid']); ?></p>
                <?php else : ?>
                    <p>No data available for the given ID.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-16 col-md-12">
                <h2 class="judul">verifikasi Pembayaran Zakat</h2>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Donatur" aria-label="Search">
                </form>
                <table class="table table-striped" id="verifikasi-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Donatur</th>
                            <th>Jumlah</th>
                            <th>Gambar Bukti</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="verifikasi-table-body">
                        <?php if (!empty($donasi)) : ?>
                            <?php foreach ($donasi as $item) : ?>
                                <tr>
                                    <td><?= esc($item['create_at']); ?></td>
                                    <td><?= esc($item['nama_donatur']); ?></td>
                                    <td><?= esc($item['nominal']); ?></td>
                                    <td>
                                        <?php if (!empty($item['gambar_bukti'])) : ?>
                                            <img src="<?= base_url('img/' . esc($item['gambar_bukti'])); ?>" alt="Bukti Donasi" width="100">
                                        <?php else : ?>
                                            Tidak ada gambar
                                        <?php endif; ?>
                                    </td>
                                    <td class="column-center">
                                        <a class="ceklis" href="/donasi/verifikasi/<?= $item['id_donasi']?>">✔</a>
                                        <a class="silang" href="/donasi/unverifikasi/<?= $item['id_donasi']?>">✘</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Tidak ada data donasi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const verifikasiTableBody = document.getElementById('verifikasi-table-body');
                            if (verifikasiTableBody) {
                                for (let i = 0; i < 10; i++) {
                                    const tr = document.createElement('tr');
                                    tr.innerHTML = `
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td class="column-center">
                                            <a class="ceklis">✔</a>
                                            <a class="silang">✘</a>
                                        </td>
                                    `;
                                    verifikasiTableBody.appendChild(tr);
                                }
                            } else {
                                console.error('Element with ID "verifikasi-table-body" not found.');
                            }
                        });
                    </script>
                    <div style="text-align: right;">
                        <button class="btn btn-primary">Verifikasi Semua</button>
                        <button class="btn btn-primary">Batalkan Semua</button>
                    </div>
                </table>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('verifikasi-table').getElementsByTagName('tbody')[0];
        const rows = tableBody.getElementsByTagName('tr');
        const totalSaldoElement = document.getElementById('totalSaldo');

        // Function to add empty rows
        function addEmptyRows(numberOfRows) {
            for (let i = 0; i < numberOfRows; i++) {
                const row = tableBody.insertRow();
                for (let j = 0; j < 4; j++) { // Assuming there are 4 columns in the table
                    const cell = row.insertCell();
                    cell.innerHTML = '&nbsp;'; // Non-breaking space
                }
            }
        }

    });
</script>

<?= $this->endSection('content'); ?>