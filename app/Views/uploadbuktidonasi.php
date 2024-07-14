<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-16 col-md-8">
                <h2 class="judul">Informasi Donasi Dalam Proses Verifikasi</h2>
                <p>Note : Jika Data donatur sudah hilang di tabel berati Donasi sudah diverifikasi oleh pengurus
                    amil zakat
                <p>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Keyword Nama Donatur" aria-label="Search">
                </form>
                <table class="table table-striped" id="donasi-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Donatur</th>
                            <th>No telp</th>
                            <th>Bukti bayar</th>
                            <th>Nominal</th>
                            <td><input type="checkbox" class="row-checkbox"></td>
                        </tr>
                    </thead>
                    <tbody id="zakat-table-body">
                        <?php foreach ($donasi as $k) : ?>
                            <tr data-id="<?= $k['id_donasi']; ?>">
                                <td><?= $k['create_at']; ?></td>
                                <td><?= $k['nama_donatur']; ?></td>
                                <td><?= $k['ho_telp']; ?></td>
                                <td>
                                    <?php if (!empty($k['bukti_transfer'])) : ?>
                                        <a href="#" class="view-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="<?= base_url('img/' . esc($k['bukti_transfer'])); ?>">
                                            <?= esc($k['bukti_transfer']); ?>
                                        </a>
                                    <?php else : ?>
                                        Belum Upload Bukti bayar
                                    <?php endif; ?>
                                </td>
                                <td><?= $k['nominal']; ?></td>
                                <td><input type="checkbox" class="row-checkbox"></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php
                        // Add empty rows if the number of rows is less than rowsPerPage
                        $rowsPerPage = 10;
                        $currentRowCount = count($donasi);
                        if ($currentRowCount < $rowsPerPage) {
                            for ($i = $currentRowCount; $i < $rowsPerPage; $i++) {
                                echo "
                                <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
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
                <form action="<?= base_url('/upload-bukti-transfer'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="buktiTransfer">Upload Bukti Transfer</label>
                            <input type="file" class="form-control" id="buktiTransfer" name="postMedia[]" required multiple>
                            <input type="hidden" name="donasi_id" id="donasiId" value="">
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mt-3 mt-md-0" id="uploadButton">Upload</button>
                        </div>
                    </div>
                </form>
                <script>
                    document.getElementById('uploadButton').addEventListener('click', function(event) {
                        const donasiId = document.getElementById('donasiId').value;
                        if (!donasiId) {
                            event.preventDefault();
                            alert('Pilih Donatur yang akan di mengupload bukti.');
                        }
                    });
                </script>
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination">
                        <!-- Pagination items will be inserted here by JavaScript -->
                    </ul>
                </nav>
                <script>
                    const zakatTableBody = document.getElementById('zakat-table-body');
                    const rowsPerPage = 10; // Set rows per page to 10
                    const rows = Array.from(zakatTableBody.getElementsByTagName('tr'));
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
                            const li = document.createElement('li');
                            li.className = 'page-item';
                            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                            li.addEventListener('click', function() {
                                currentPage = i;
                                displayRows(currentPage);
                                updatePagination();
                            });
                            pagination.appendChild(li);
                        }
                    }

                    function updatePagination() {
                        const pageItems = pagination.getElementsByClassName('page-item');
                        Array.from(pageItems).forEach((item, index) => {
                            item.classList.toggle('active', index + 1 === currentPage);
                        });
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        displayRows(currentPage);
                        setupPagination();
                        updatePagination();
                    });
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('searchInput');
                        const tableBody = document.getElementById('zakat-table-body');
                        const rows = tableBody.getElementsByTagName('tr');

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
                                // Set the donasi_id in the hidden input field
                                const donasiId = row.dataset.id;
                                document.getElementById('donasiId').value = donasiId;
                            });
                        });
                    });
                </script>
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
    });
</script>

<?= $this->endSection('content'); ?>