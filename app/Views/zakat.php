<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-8">
                <h2 class="judul">Informasi Zakat</h2>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Zakat" aria-label="Search">
                </form>
                <table class="table table-striped" id="zakat-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="zakat-table-body">
                        <?php foreach ($zakat as $k) : ?>
                            <tr>
                                <td><?= $k['tgl']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td><?= $k['nominal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php
                        // Add empty rows if the number of rows is less than rowsPerPage
                        $rowsPerPage = 10;
                        $currentRowCount = count($zakat);
                        if ($currentRowCount < $rowsPerPage) {
                            for ($i = $currentRowCount; $i < $rowsPerPage; $i++) {
                                echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
                <div style="text-align: right;">
                    <h4>Total Saldo Zakat: <span id="totalSaldo">Rp 00.00</span></h4>
                    <a href="<?= base_url('/donasi'); ?>" class="btn btn-primary">Donasi</a>
                </div>
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

        calculateTotal();
    });
</script>

<?= $this->endSection('content'); ?>