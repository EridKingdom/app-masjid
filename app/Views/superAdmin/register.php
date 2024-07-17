<?= $this->extend('layout/supertemplate'); ?>
<?= $this->Section('content'); ?>
<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-8">
                <h2 class="judul">Informasi Pendaftaran</h2>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Data Pendaftaran" aria-label="Search">
                </form>
                <table class="table table-striped" id="pendaftaran-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Profil Masjid</th>
                            <th>Nama Masjid</th>
                            <th>Nama Pengurus</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Surat Takmir</th>
                            <th>Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody id="pendaftaran-table-body">
                    </tbody>
                </table>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const pendaftaranTableBody = document.getElementById('pendaftaran-table-body');

                        // Create 10 empty rows

                        var data = JSON.parse(`<?= json_encode($userMasjid) ?>`)

                        for (let i = 0; i < data.length; i++) {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td><input type="checkbox" class="row-checkbox"></td>
                                <td><img src="/img/`+data[i]["sampul"]+`"></td>
                                <td>`+data[i]["nama_masjid"]+`</td>
                                <td>`+data[i]["nama_pengurus"]+`</td>
                                <td>`+data[i]["username"]+`</td>
                                <td>`+data[i]["email"]+`</td>
                                <td><a href="/dokumen/`+data[i]["surat_takmir"]+`">` +data[i]["surat_takmir"]+`</a></td>
 <td><a href="/dokumen/`+data[i]["sertifikat"]+`">` +data[i]["sertifikat"]+`</a></td>
                            `;
                            pendaftaranTableBody.appendChild(tr);
                        }

                        // Add click event listener to each row
                        pendaftaranTableBody.addEventListener('click', function(event) {
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
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Validasi Pendaftaran</button>
                    <button type="submit" class="btn btn-primary">Batalkan Pendaftaran</button>
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