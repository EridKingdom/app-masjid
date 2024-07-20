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
                    $query = $db->query("SELECT id AS id_masjid, nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3 FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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
    $query = $db->query("SELECT id AS id_masjid, sampul, nama_masjid, deskripsi, alamat_masjid FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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
                        <img class="profileHal-img" src="/img/<?= htmlspecialchars($gambar_masjid, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;"> <!-- Tambahkan margin-right -->
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

<!-- Notification Element -->
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('<?= session()->getFlashdata('success') ?>');
        });
    </script>
<?php endif; ?>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-8">
                <h2 class="judul">Konfigurasi Zakat Beras pada <?= esc($masjid['nama_masjid']); ?></h2>
                <table class="table table-striped" id="beras-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Beras</th>
                            <th>Harga Per-Kg</th>
                            <th>*</th> <!-- Added column for checkbox -->
                        </tr>
                    </thead>
                    <tbody id="beras-table-body">
                        <?php $i = 1; ?>
                        <?php foreach ($berasZakat as $beras) : ?>
                            <tr data-id="<?= esc($beras['id_beras']); ?>">
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($beras['jenis_beras']); ?></td>
                                <td><?= 'Rp ' . number_format(esc($beras['harga']), 0, ',', '.'); ?></td>
                                <td><input type="checkbox" class="row-checkbox"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    const berasTableBody = document.getElementById('beras-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="checkbox" class="row-checkbox"></td>
                        `;
                        berasTableBody.appendChild(tr);
                    }
                </script>
                <div id="pagination-controls" style="text-align: center;">
                    <button id="prev-page" disabled>Previous</button>
                    <span id="page-numbers"></span>
                    <button id="next-page">Next</button>
                </div>
                <div style="text-align: right;">
                    <button id="addButton" class="btn btn-primary">Tambahkan</button>
                    <button id="editButton" class="btn btn-secondary edit">Edit</button>
                    <button class="btn btn-danger delete">Hapus</button> <!-- Updated button for delete -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Form -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Konfigurasi Beras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="/donasi/handleFormData/<?= $masjid['id_masjid'] ?>">
                    <div class="mb-3">
                        <label for="jenis_beras" class="form-label">Jenis Beras</label>
                        <input type="text" class="form-control" id="jenis_beras" name="jenis_beras" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga per-KG</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form for Editing Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Beras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="/donasi/updateFormData/<?= $masjid['id_masjid'] ?>">
                    <input type="hidden" id="editId" name="id_beras">
                    <div class="mb-3">
                        <label for="editjenisberas" class="form-label">Jenis Beras</label>
                        <input type="text" class="form-control" id="editjenisberas" name="jenis_beras" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNominal" class="form-label">Harga per-KG</label>
                        <input type="number" class="form-control" id="editNominal" name="harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addButton');
        const editButton = document.getElementById('editButton');
        const deleteButton = document.querySelector('.btn-danger.delete');
        const addModal = new bootstrap.Modal(document.getElementById('addModal'));
        const editModal = new bootstrap.Modal(document.getElementById('editModal'));

        addButton.addEventListener('click', function() {
            addModal.show();
        });

        editButton.addEventListener('click', function() {
            const checkedRow = document.querySelector('input.row-checkbox:checked');
            if (checkedRow) {
                const row = checkedRow.closest('tr');
                const cells = row.getElementsByTagName('td');
                document.getElementById('editId').value = row.dataset.id;
                document.getElementById('editjenisberas').value = cells[0].textContent.trim();
                document.getElementById('editNominal').value = cells[1].textContent.trim().replace(/[^0-9,-]+/g, "");
                editModal.show();
            } else {
                alert('Please select a row to edit.');
            }
        });

        deleteButton.addEventListener('click', function() {
            const checkedRow = document.querySelector('input.row-checkbox:checked');
            if (checkedRow) {
                if (confirm('Are you sure you want to delete this data?')) {
                    const row = checkedRow.closest('tr');
                    const id = row.dataset.id;
                    window.location.href = `/donasi/deleteFormData/${id}`;
                }
            } else {
                alert('Please select a row to delete.');
            }
        });

        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('beras-table-body');
        const rows = tableBody.getElementsByTagName('tr');
        const totalSaldoElement = document.getElementById('totalSaldo');

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

        function calculateTotal() {
            let total = 0;
            Array.from(rows).forEach(function(row) {
                const cells = row.getElementsByTagName('td');
                const nominal = cells[2].textContent.trim();
                if (nominal) {
                    total += parseFloat(nominal.replace(/[^0-9,-]+/g, ""));
                }
            });
            totalSaldoElement.textContent = formatRupiah(total.toString(), 'Rp ');
        }

        searchInput.addEventListener('keyup', function() {
            const searchText = searchInput.value.toLowerCase();
            Array.from(rows).forEach(function(row) {
                const cells = row.getElementsByTagName('td');
                let found = false;
                Array.from(cells).forEach(function(cell) {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        found = true;
                    }
                });
                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            calculateTotal();
        });

        // Add event listener to rows for checkbox toggle
        Array.from(rows).forEach(function(row) {
            row.addEventListener('click', function() {
                const checkbox = row.querySelector('.row-checkbox');
                const checkedRow = document.querySelector('input.row-checkbox:checked');
                if (checkedRow) checkedRow.checked = false;
                if (checkbox) {
                    checkbox.checked = !checkbox.checked;
                }
            });
        });

        calculateTotal();

        // Pagination
        const rowsPerPage = 10;
        const paginationControls = document.getElementById('pagination-controls');
        const prevPageButton = document.getElementById('prev-page');
        const nextPageButton = document.getElementById('next-page');
        const pageNumbers = document.getElementById('page-numbers');
        let currentPage = 1;

        function displayRows(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });

            updatePageNumbers();
            prevPageButton.disabled = page === 1;
            nextPageButton.disabled = page === Math.ceil(rows.length / rowsPerPage);
        }

        function updatePageNumbers() {
            pageNumbers.innerHTML = '';
            for (let i = 1; i <= Math.ceil(rows.length / rowsPerPage); i++) {
                const pageNumber = document.createElement('span');
                pageNumber.textContent = i;
                pageNumber.style.cursor = 'pointer';
                pageNumber.style.margin = '0 5px';
                pageNumber.style.padding = '5px 10px';
                pageNumber.style.border = '1px solid #007bff';
                pageNumber.style.borderRadius = '5px';
                pageNumber.style.backgroundColor = i === currentPage ? '#007bff' : '#fff';
                pageNumber.style.color = i === currentPage ? '#fff' : '#007bff';

                pageNumber.addEventListener('click', function() {
                    currentPage = i;
                    displayRows(currentPage);
                });

                pageNumbers.appendChild(pageNumber);
            }
        }

        prevPageButton.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                displayRows(currentPage);
            }
        });

        nextPageButton.addEventListener('click', function() {
            if (currentPage < Math.ceil(rows.length / rowsPerPage)) {
                currentPage++;
                displayRows(currentPage);
            }
        });

        displayRows(currentPage);
    });
</script>

<?= $this->endSection('content'); ?>