<?= $this->extend('layout/supertemplate'); ?>
<?= $this->Section('content'); ?>
    <section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
        <div class="container-fluid">
            <div class="row">
                <div class="content-wrap col-12 col-md-8">
                    <h2 class="judul">Pengajuan Lupa Password</h2>
                    <form class="cari" role="search" method="GET">
                        <input class="form-control me-2" type="search" id="searchInput" name="keyword"
                               placeholder="Cari Data Akun" aria-label="Search">
                    </form>
                    <table class="table table-striped" id="resetter-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Profil Masjid</th>
                            <th>Nama Masjid</th>
                            <th>Nama Pengurus</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>No Telp</th>
                        </tr>
                        </thead>
                        <tbody id="resetter-table-body">
                        </tbody>
                    </table>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {


                            const resetterTableBody = document.getElementById('resetter-table-body');
                            const resetButton = document.getElementById('resetPassword');
                            const sendEmail = document.getElementById('sendEmail');
                            const sendWa = document.getElementById('sendWa');

                            resetButton.addEventListener('click', function (event) {
                                var checked = document.querySelector('.row-checkbox:checked');
                                if(checked) {
                                    console.log(checked.value);
                                    window.location.href = "/reset-password/"+checked.value+"/admin";
                                } else {
                                    alert('Tidak ada data yang dipilih');
                                }
                            });

                            sendEmail.addEventListener('click', function (event) {
                                var checked = document.querySelector('.row-checkbox:checked');
                                let origin = window.location.origin;
                                if(checked) {
                                   let email = checked.parentElement.parentElement.querySelector('.email').innerHTML;
                                    window.location.href = "mailto:" +email+"?subject=Reset Password&body=Gunakan link berikut untuk reset password: " + origin + "/reset-password/"+checked.value;
                                } else {
                                    alert('Tidak ada data yang dipilih');
                                }
                            });

                            sendWa.addEventListener('click', function (event) {
                                var checked = document.querySelector('.row-checkbox:checked');
                                let origin = window.location.origin;
                                if(checked) {
                                    let noTelp = checked.parentElement.parentElement.querySelector('.no_telp').innerHTML;
                                    window.open("https://wa.me/"+noTelp+"?text=Gunakan link berikut untuk reset password: " + origin + "/reset-password/"+checked.value, '_blank');
                                } else {
                                    alert('Tidak ada data yang dipilih');
                                }
                            });

                            var data = JSON.parse(`<?= json_encode($userMasjid) ?>`);

                            for (let i = 0; i < data.length; i++) {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                                <div style="display: none;">` + data[i]["id_user"] + `</div>
                                <td><input type="checkbox" name="checkbox" onclick="return false;" class="row-checkbox" value="` + data[i]["id_user"] + `"></td>
                                <td><img src="/img/` + data[i]["sampul"] + `"></td>
                                <td>` + data[i]["nama_masjid"] + `</td>
                                <td>` + data[i]["nama_pengurus"] + `</td>
                                <td>` + data[i]["username"] + `</td>
                                <td class="email">` + data[i]["email"] + `</td>
                                <td class="no_telp">` + data[i]["no_telp"] + `</td>
                            `;
                                resetterTableBody.appendChild(tr);
                            }

                            // Add click event listener to each row
                            resetterTableBody.addEventListener('click', function (event) {
                                const target = event.target;
                                if (target.tagName === 'TD') {
                                    const checkbox = target.parentElement.querySelector('.row-checkbox');
                                    var checkboxes = document.getElementsByName('checkbox');
                                    console.log(checkboxes)

                                    if (checkbox) {
                                        console.log("masuk")
                                        if(!checkbox.checked) {
                                            for (var i = 0, n = checkboxes.length; i < n; i++) {
                                                checkboxes[i].checked = false;
                                            }
                                        }
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
                        const resetterTableBody = document.getElementById('resetter-table-body');
                        const rowsPerPage = 10; // Set rows per page to 10
                        const rows = Array.from(resetterTableBody.getElementsByTagName('tr'));
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
                                li.addEventListener('click', function () {
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

                        document.addEventListener('DOMContentLoaded', function () {
                            displayRows(currentPage);
                            setupPagination();
                            updatePagination();
                        });
                    </script>
                    <div style="text-align: right;">
                        <a class="btn btn-secondary" id="resetPassword">Reset Password</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="fas fa-share"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="sendEmail"
                                     >Email</a>
                                </li>
                                <li><a class="dropdown-item" id="sendWa"
                                      >WhatsApp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('resetter-table-body');
            const rows = tableBody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function () {
                const searchText = searchInput.value.toLowerCase();
                Array.from(rows).forEach(function (row) {
                    const cells = row.getElementsByTagName('td');
                    let found = false;
                    Array.from(cells).forEach(function (cell) {
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
        });
    </script>

<?= $this->endSection('content'); ?>