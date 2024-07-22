<?= $this->extend('layout/admintemplate'); ?>
<?= $this->Section('content'); ?>

<!-- Tambahkan link rel di sini -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/mobirise/css/mbr-additional.css?v=N4qxfg" type="text/css">

<section data-bs-version="5.1" class="slider3 cid-ueOcGCqmku" id="slider03-1o">
    <div class="carousel slide" id="ueOkfUJH6x" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <?php
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

        <a class="carousel-control-prev" role="button" data-bs-slide="prev" href="#ueOkfUJH6x">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" role="button" data-bs-slide="next" href="#ueOkfUJH6x">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
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

<?php if (session()->getFlashdata('error')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('<?= session()->getFlashdata('error') ?>');
        });
    </script>
<?php endif; ?>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <div class="d-flex align-items-center"> <!-- Tambahkan div ini -->
                        <img class="profileHal-img" src="/img/<?= htmlspecialchars($masjid['sampul'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;">
                        <!-- Tambahkan margin-right -->
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
            <div class="content-wrap col-12 col-md-8">
                <h2 class="judul">Informasi Zakat Fitah Pada <?= esc($masjid['nama_masjid']); ?></h2>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Zakat" aria-label="Search">
                </form>
                <table class="table table-striped" id="zakat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jenis Berat</th>
                            <th>Nominal</th>
                            <th>*</th> <!-- Added column for checkbox -->
                        </tr>
                    </thead>
                    <tbody id="zakat-table-body">
                        <?php $i = 1; ?>
                        <?php foreach ($zakat as $k) : ?>
                            <tr data-id="<?= esc($k['id_zakat']); ?>">
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($k['tgl']); ?></td>
                                <td><?= esc($k['keterangan']); ?></td>
                                <td><?= esc($k['jenis_beras']); ?></td>
                                <td style="display: none"><?= esc($k['id_beras']); ?></td>
                                <td><?= 'Rp ' . number_format(esc($k['nominal']), 0, ',', '.'); ?></td>
                                <td><input type="checkbox" class="row-checkbox"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="pagination" class="pagination"></div> <!-- Elemen untuk pagination -->
                <script>
                    const zakatTableBody = document.getElementById('zakat-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="checkbox" class="row-checkbox"></td>
                        `;
                        zakatTableBody.appendChild(tr);
                    }
                </script>
                <div style="text-align: right;">
                    <h4>Total Saldo Zakat: <span id="totalSaldo">Rp 00.00</span></h4>
                    <button id="addButton" class="btn btn-primary">Tambahkan</button>
                    <button class="btn btn-secondary edit">Edit</button>
                    <button class="btn btn-danger delete">Hapus</button> <!-- Added button for delete -->
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
                <h5 class="modal-title" id="addModalLabel">Tambah Data Zakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="/zakat2/handleFormData/<?= $masjid['id'] ?>">
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="addTgl" name="tgl" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="addKeterangan" name="keterangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="addJenisBeras" class="form-label">jenis Beras</label>
                        <select class="form-control" id="addJenisBeras" name="id_beras" required>
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
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="text" class="form-control" id="addNominal" name="nominal" required readonly>
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
                <h5 class="modal-title" id="editModalLabel">Edit Data Zakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="/zakat2/updateFormData/<?= $masjid['id'] ?>">
                    <input type="hidden" id="editId" name="id_zakat">
                    <div class="mb-3">
                        <label for="editTgl" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="editTgl" name="tgl" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKeterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="editKeterangan" name="keterangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJenisBeras" class="form-label">jenis Beras</label>
                        <select class="form-control" id="editJenisBeras" name="id_beras">
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
                    <div class="mb-3">
                        <label for="editNominal" class="form-label">Nominal</label>
                        <input type="text" class="form-control" id="editNominal" name="nominal" readonly required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('zakat-table-body');
        const rows = tableBody.getElementsByTagName('tr');
        const totalSaldoElement = document.getElementById('totalSaldo');
        const addJenisBeras = document.getElementById('addJenisBeras');
        const editJenisBeras = document.getElementById('editJenisBeras');
        editJenisBeras.addEventListener('change', function(event) {
            let id = event.target.value;
            console.log(id);
            var data = JSON.parse(`<?= json_encode($beras) ?>`)
            let selected = data.find((d) => d.id_beras == id);
            const nominal = document.getElementById('editNominal');
            if (selected) {
                nominal.value = selected.harga * 3;

            } else {
                nominal.value = "";
            }

        });

        addJenisBeras.addEventListener('change', function(event) {
            let id = event.target.value;
            console.log(id);
            var data = JSON.parse(`<?= json_encode($beras) ?>`)
            let selected = data.find((d) => d.id_beras == id);
            const nominal = document.getElementById('addNominal');
            if (selected) {
                nominal.value = selected.harga * 3;

            } else {
                nominal.value = "";
            }

        });

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
                const nominal = cells[4].textContent.trim();
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

        const addButton = document.getElementById('addButton');
        const addModal = new bootstrap.Modal(document.getElementById('addModal'));

        if (addButton) {
            addButton.addEventListener('click', function() {
                addModal.show();
            });
        }

        const editButton = document.querySelector('.btn-secondary.edit');
        const editModal = new bootstrap.Modal(document.getElementById('editModal'));

        if (editButton) {
            editButton.addEventListener('click', function() {
                const checkedRow = document.querySelector('input.row-checkbox:checked');
                if (checkedRow) {
                    const row = checkedRow.closest('tr');
                    const cells = row.getElementsByTagName('td');
                    console.log(row.dataset.id);
                    document.getElementById('editId').value = row.dataset.id;
                    document.getElementById('editTgl').value = cells[0].textContent.trim();
                    document.getElementById('editKeterangan').value = cells[1].textContent.trim();
                    document.getElementById('editJenisBeras').value = cells[3].textContent.trim();
                    document.getElementById('editNominal').value = cells[4].textContent.trim().replace(/[^0-9]/g, '');
                    console.log(document.getElementById('editNominal').value)
                    editModal.show();
                } else {
                    alert('Pilih Data yang di edit.');
                }
            });
        }

        const deleteButton = document.querySelector('.btn-danger.delete');
        if (deleteButton) {
            deleteButton.addEventListener('click', function() {
                const checkedRow = document.querySelector('input.row-checkbox:checked');
                if (checkedRow) {
                    if (confirm('Apa Kamu Yakin Menghapus Data?')) {
                        const row = checkedRow.closest('tr');
                        const id = row.dataset.id;
                        window.location.href = `/zakat2/deleteFormData/${id}`;
                    }
                } else {
                    alert('Please Pilih Data yang mau Dihapus.');
                }
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const zakatTableBody = document.getElementById('zakat-table-body');
        const rows = zakatTableBody.querySelectorAll('tr');
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#zakat-table-body tr');

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
    });
</script>

<?= $this->endSection('content'); ?>