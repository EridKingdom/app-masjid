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
                    $query = $db->query("SELECT id, nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3 FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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

// Inisialisasi variabel untuk pesan sukses atau error
$successMessage = '';
$errorMessage = '';

// Proses form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tgl'] ?? null;
    $keterangan = $_POST['keterangan'] ?? null;
    $jenis_kas = $_POST['jenis_kas'] ?? null;
    $nominal = $_POST['nominal'] ?? null;

    // Validasi data yang diterima
    if ($tanggal && $keterangan && $jenis_kas && $nominal) {
        // Proses penyimpanan data ke database
        $db = \Config\Database::connect();
        $builder = $db->table('db_kas_masjid');
        $data = [
            'tgl' => $tanggal,
            'keterangan' => $keterangan,
            'jenis_kas' => $jenis_kas,
            'nominal' => $nominal,
            'id_masjid' => $id_user // Asumsikan id_user adalah id_masjid
        ];

        if ($builder->insert($data)) {
            $successMessage = 'Data berhasil disimpan.';
        } else {
            $errorMessage = 'Gagal menyimpan data.';
        }
    } else {
        $errorMessage = 'Semua field harus diisi!';
    }
}

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

<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">

    <div class="row justify-content-center">
        <div class="card col-md-20 col-lg-9">
            <br>
            <h3 class="text-center mb-3">Uang Kas Masjid <?= esc($masjid['nama_masjid']); ?></h3> <!-- Added title above the table -->
            <form class="cari" role="search" method="GET">
                <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Kas Masjid" aria-label="Search">
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('searchInput');
                    const tableRows = document.querySelectorAll('#uangkas-table-body tr');

                    searchInput.addEventListener('input', function() {
                        const keyword = searchInput.value.toLowerCase();

                        tableRows.forEach(row => {
                            const keterangan = row.cells[2].textContent.toLowerCase();
                            const jenisKas = row.cells[3].textContent.toLowerCase();

                            if (keterangan.includes(keyword) || jenisKas.includes(keyword)) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    });
                });
            </script>

            <table id="kasTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th> <!-- Checkbox untuk memilih semua -->
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jenis Kas</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody id="uangkas-table-body">
                    <?php foreach ($kas_masjid as $k) : ?>
                        <tr class="table-row">
                            <td><input type="checkbox" class="selectRow"></td> <!-- Checkbox untuk setiap baris -->
                            <td><?= $k['tgl']; ?></td>
                            <td><?= $k['keterangan']; ?></td>
                            <td><?= $k['jenis_kas']; ?></td>
                            <td><?= $k['nominal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    // Add empty rows if the number of rows is less than rowsPerPage
                    $rowsPerPage = 10;
                    $currentRowCount = count($kas_masjid);
                    if ($currentRowCount < $rowsPerPage) {
                        for ($i = $currentRowCount; $i < $rowsPerPage; $i++) {
                            echo "<tr>
                                        <td><input type='checkbox' class='selectRow'></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div id="pagination" class="pagination"></div> <!-- Elemen untuk pagination -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('selectAll').addEventListener('change', function() {
                        const checkboxes = document.querySelectorAll('.selectRow');
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });
                    });

                    document.querySelectorAll('.table-row').forEach(row => {
                        row.addEventListener('click', function() {
                            const checkbox = this.querySelector('.selectRow');
                            checkbox.checked = !checkbox.checked;
                        });

                        row.addEventListener('mouseover', function() {
                            this.style.cursor = 'pointer';
                        });
                    });

                    // Pagination
                    const rows = document.querySelectorAll('#uangkas-table-body tr');
                    const rowsPerPage = 10;
                    const pagination = document.getElementById('pagination');
                    let currentPage = 1;

                    function displayRows(page) {
                        const start = (page - 1) * rowsPerPage;
                        const end = start + rowsPerPage;

                        rows.forEach((row, index) => {
                            row.style.display = (index >= start && index < end) ? '' : 'none';
                        });
                    }

                    function setupPagination() {
                        const pageCount = Math.ceil(rows.length / rowsPerPage);
                        pagination.innerHTML = '';

                        for (let i = 1; i <= pageCount; i++) {
                            const pageButton = document.createElement('button');
                            pageButton.textContent = i;
                            pageButton.classList.add('page-btn');
                            if (i === currentPage) {
                                pageButton.classList.add('active');
                            }
                            pageButton.addEventListener('click', function() {
                                currentPage = i;
                                displayRows(currentPage);
                                document.querySelectorAll('.page-btn').forEach(btn => btn.classList.remove('active'));
                                pageButton.classList.add('active');
                            });
                            pagination.appendChild(pageButton);
                        }
                    }

                    displayRows(currentPage);
                    setupPagination();
                });
            </script>
            <div style="text-align: right;">
                <h4>Total Saldo Masjid: <span id="totalSaldo">Rp 00.00</span></h4>
                <button class="btn btn-primary" id="addButton">Tambah</button>
                <button class="btn btn-primary">Edit</button>
                <button class="btn btn-primary">Hapus</button>
            </div>



        </div>
    </div>
</section>

<!-- Modal for Adding Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Kas Masjid</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="/uang/handleFormData/<?= $masjid['id_masjid'] ?>">
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kas" class="form-label">Jenis Kas</label>
                        <select class="form-control" id="jenis_kas" name="jenis_kas" required>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#uangkas-table-body tr');
        const rowsPerPage = 10;
        const pagination = document.getElementById('pagination');
        let currentPage = 1;

        function displayRows(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });

        }

        function setupPagination() {
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            pagination.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.classList.add('page-btn');
                if (i === currentPage) {
                    pageButton.classList.add('active');
                }
                pageButton.addEventListener('click', function() {
                    currentPage = i;
                    displayRows(currentPage);
                    document.querySelectorAll('.page-btn').forEach(btn => btn.classList.remove('active'));
                    pageButton.classList.add('active');
                });
                pagination.appendChild(pageButton);
            }
        }

        displayRows(currentPage);
        setupPagination();

        // Event listener for Add button
        const addButton = document.getElementById('addButton');
        const addModal = new bootstrap.Modal(document.getElementById('addModal'));

        addButton.addEventListener('click', function() {
            addModal.show();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.getElementById('uangkas-table-body').querySelectorAll('tr');
        let totalSaldo = 0;

        rows.forEach(row => {
            // Check if the row has the expected number of cells
            if (row.cells.length >= 5) {
                const jenisKas = row.cells[3].textContent.trim().toLowerCase();
                const nominalText = row.cells[4].textContent.trim();
                const nominal = parseInt(nominalText.replace(/[^0-9]/g, ''), 10);

                if (jenisKas === 'masuk') {
                    totalSaldo += nominal;
                } else if (jenisKas === 'keluar') {
                    totalSaldo -= nominal;
                }
            } else {
                console.log('Row does not have enough cells:', row);
            }
        });

        const totalSaldoElement = document.getElementById('totalSaldo');
        if (totalSaldoElement) {
            totalSaldoElement.textContent = `Rp ${totalSaldo.toLocaleString()}`;
        } else {
            console.error('totalSaldo element not found');
        }
    });
</script>

<script>
    document.getElementById('addForm').addEventListener('submit', function(event) {
        const tanggal = document.getElementById('tgl').value;
        const keterangan = document.getElementById('keterangan').value;
        const jenis_kas = document.getElementById('jenis_kas').value;
        const nominal = document.getElementById('nominal').value;

        if (!tanggal || !keterangan || !jenis_kas || !nominal) {
            alert('Semua field harus diisi!');
            event.preventDefault(); // Menghentikan form dari pengiriman
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table-row');

        rows.forEach(row => {
            row.addEventListener('click', function() {
                // Hapus kelas 'selected' dari semua baris
                rows.forEach(r => r.classList.remove('selected'));
                // Tambahkan kelas 'selected' ke baris yang diklik
                row.classList.add('selected');
            });
        });
    });
</script>

<?php if ($successMessage) : ?>
    <div class="alert alert-success">
        <?= $successMessage ?>
    </div>
<?php endif; ?>

<?php if ($errorMessage) : ?>
    <div class="alert alert-danger">
        <?= $errorMessage ?>
    </div>
<?php endif; ?>

<?= $this->endSection('content'); ?>