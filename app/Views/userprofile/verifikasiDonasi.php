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
$gambar_masjid = '';
$id_masjid = null;
if ($id_user) {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT id, nama_masjid, sampul FROM db_data_masjid WHERE id_user = ?", [$id_user]);
    $result = $query->getRow();
    if ($result) {
        $id_masjid = $result->id;
        $nama_masjid = $result->nama_masjid;
        $gambar_masjid = $result->sampul;
    }
}
?>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <div class="d-flex align-items-center"> <!-- Tambahkan div ini -->
                        <img class="profile-img" src="/img/<?= htmlspecialchars($gambar_masjid, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;"> <!-- Tambahkan margin-right -->
                        <div>
                            <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                                <strong><?= esc($masjid['nama_masjid']); ?></strong>
                            </h5>
                            <p class="mbr-section-text mbr-fonts-style mb-4 display-7">
                                <?= esc($masjid['deskripsi']); ?>
                            </p>
                            <p class="mbr-text mbr-fonts-style display-7"><?= esc($masjid['alamat_masjid']); ?></p>
                        </div>
                    </div>
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
                                        <?php if (!empty($item['bukti_transfer'])) : ?>
                                            <a href="#" class="view-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="<?= base_url('img/' . esc($item['bukti_transfer'])); ?>">
                                                <?= esc($item['bukti_transfer']); ?>
                                            </a>
                                        <?php else : ?>
                                            Belum Upload Bukti bayar
                                        <?php endif; ?>
                                    </td>
                                    <td class="column-center">
                                        <a class="ceklis" href="/donasi/verifikasi/<?= $item['id_donasi'] ?>" onclick="return confirm('Are you sure you want to verify this donation?')">✔</a>
                                        <a class="silang" href="/donasi/unverifikasi/<?= $item['id_donasi'] ?>" onclick="return confirm('Are you sure you want to delete this donation?')">✘</a>
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
                        <a class="btn btn-primary" href="/donasi/verifikasi/all" onclick="return confirm('Are you sure you want to verify all donations?')">Verifikasi Semua</a>
                        <a class="btn btn-primary" href="/donasi/unverifikasi/all" onclick="return confirm('Are you sure you want to delete all donations?')">Batalkan Semua</a>
                    </div>
                </table>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Bukti Transfer">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        imageModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const imageUrl = button.getAttribute('data-image');
            modalImage.src = imageUrl;
        });

        // Display success message if available
        <?php if (session()->getFlashdata('success')) : ?>
            alert('<?= session()->getFlashdata('success') ?>');
        <?php endif; ?>

        // Display error message if available
        <?php if (session()->getFlashdata('error')) : ?>
            alert('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
    });
</script>

<?= $this->endSection('content'); ?>