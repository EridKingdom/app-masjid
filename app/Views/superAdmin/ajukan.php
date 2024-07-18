<?= $this->extend('layout/supertemplate'); ?>
<?= $this->Section('content'); ?>
<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <h2 class="judul">Pengajuan Perubahan</h2>
            <form class="cari" role="search" method="GET">
                <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Data Perubahan" aria-label="Search">
            </form>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="judul">Sesudah Perubahan</h3>
                    <table class="table table-striped" id="perubahan-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Foto KTP</th>
                                <th>Nama Masjid</th>
                                <th>Nama Pengurus</th>
                                <th>Username</th>
                                <th>email</th>
                                <th>No Telp</th>
                            </tr>
                        </thead>
                        <tbody id="perubahan-table-body">
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3 class="judul">Sebelum Perubahan</h3>
                    <table class="table table-striped" id="sebelumperubahan-table">
                        <thead>
                            <tr>

                                <th>Foto KTP</th>
                                <th>Nama Masjid</th>
                                <th>Nama Pengurus</th>
                                <th>Username</th>
                                <th>email</th>
                                <th>No Telp</th>
                            </tr>
                        </thead>
                        <tbody id="sebelumperubahan-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const perubahanTableBody = document.getElementById('perubahan-table-body');
                    const sebelumperubahanTableBody = document.getElementById('sebelumperubahan-table-body');

                    var data = JSON.parse(`<?= json_encode($userData) ?>`)
                    console.log(data)

                    // Create 10 empty rows for perubahan-table
                    for (let i = 0; i < data.length; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                                <td><input type="checkbox" class="row-checkbox"></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            `;
                        perubahanTableBody.appendChild(tr);
                    }

                    // Add click event listener to each row in perubahan-table
                    perubahanTableBody.addEventListener('click', function(event) {
                        const target = event.target;
                        if (target.tagName === 'TD') {
                            const checkbox = target.parentElement.querySelector('.row-checkbox');
                            if (checkbox) {
                                checkbox.checked = !checkbox.checked;
                            }
                        }
                    });

                    // Add click event listener to each row in sebelumperubahan-table
                    sebelumperubahanTableBody.addEventListener('click', function(event) {
                        const target = event.target;
                        if (target.tagName === 'TD') {
                            const checkbox = target.parentElement.querySelector('.row-checkbox');
                            if (checkbox) {
                                checkbox.checked = !checkbox.checked;
                            }
                        }
                    });
                });
            </script>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center" id="pagination">
                    <!-- Pagination items will be inserted here by JavaScript -->
                </ul>
            </nav>
            <script>
                const pendaftaranTableBody = document.getElementById('pendaftaran-table-body');
                const rowsPerPage = 10; // Set rows per page to 10
                const rows = Array.from(pendaftaranTableBody.getElementsByTagName('tr'));
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
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Validasi Perubahan</button>
                <button type="submit" class="btn btn-primary">Batalkan Perubahan</button>
                <button type="submit" class="btn btn-primary">Ubah Password</button>
            </div>

        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('zakat-table-body');
        const rows = tableBody.getElementsByTagName('tr');
        const totalSaldoElement = document.getElementById('totalSaldo');



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

        calculateTotal();
    });
</script>

<?= $this->endSection('content'); ?>