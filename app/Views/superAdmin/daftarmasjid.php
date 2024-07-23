<?= $this->extend('layout/supertemplate'); ?>
<?= $this->section('content'); ?>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">

    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-12">
                <div class="container">
                    <div class="table-responsive">
                        <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-1">
                            <strong style="color: black;">Data Masjid</strong>
                        </h4>
                        <hr>
                        <div class="d-flex justify-content-end mb-3">
                            <button id="blockButton" class="btn btn-danger">Blokir Akun</button>
                            <div class="btn-group ms-2">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-share"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" id="sendEmail">Email</a></li>
                                    <li><a class="dropdown-item" id="sendWa">WhatsApp</a></li>
                                </ul>
                            </div>
                        </div>
                        <table class="table" id="masjidTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Masjid</th>
                                    <th>Provinsi</th>
                                    <th>Kota/Kab</th>
                                    <th>Alamat Masjid</th>
                                    <th>Nama Pengurus</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($db_data_masjid as $k) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="selectItem" name="checkbox" value="<?= $k['id_user'] ?>"></td>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/<?= $k['sampul']; ?>" alt="Gambar tidak ditemukan" class="sampul"></td>
                                        <td><?= $k['nama_masjid']; ?></td>
                                        <td><?= $k['provinsi']; ?></td>
                                        <td><?= $k['kota_kab']; ?></td>
                                        <td><?= $k['alamat_masjid']; ?></td>
                                        <td><?= $k['nama_pengurus']; ?></td>
                                        <td class="no_telp"><?= $k['no_telp']; ?></td>
                                        <td class="email"><?= $k['email']; ?></td>
                                        <td><?= isset($k['status']) ? $k['status'] : 'N/A'; ?></td>
                                        <td>
                                            <a href="<?= base_url('/profil-super/' . $k['id']); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const blockButton = document.getElementById('blockButton');
        const selectAllCheckbox = document.getElementById('selectAll');
        const itemCheckboxes = document.querySelectorAll('.selectItem');
        const sendEmail = document.getElementById('sendEmail');
        const sendWa = document.getElementById('sendWa');

        blockButton.addEventListener('click', function (event) {
            event.preventDefault();
            let data = Array.from(document.querySelectorAll("input[type=checkbox][name=checkbox]:checked"), e => e.value);
            if(data.length > 0) {
                fetch("/block", {
                    method: "POST",
                    body: JSON.stringify({
                        userIds: data,
                    }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                }).then((response) => response.json())
                    .then((json) => console.log(json))
                    .then((_) => location.reload());
            } else  {
                alert("Tidak ada data yang dipilih");
            }
            console.log(data);
        });

        selectAllCheckbox.addEventListener('change', function() {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        sendEmail.addEventListener('click', function (event) {
            var checked = document.querySelectorAll('.selectItem:checked');
            let origin = window.location.origin;
            if(checked.length > 0) {
                checked.forEach(function(item) {
                    let email = item.parentElement.parentElement.querySelector('.email').innerHTML;
                    window.location.href = "mailto:" + email + "?subject=Verifikasi Akun&body=Selamat akun anda berhasil di verifikasi, untuk selanjutnya anda sudah dapat login pada sistem " + origin + "/login";
                });
            } else {
                alert('Tidak ada data yang dipilih');
            }
        });

        sendWa.addEventListener('click', function (event) {
            var checked = document.querySelectorAll('.selectItem:checked');
            let origin = window.location.origin;
            if(checked.length > 0) {
                checked.forEach(function(item) {
                    let noTelp = item.parentElement.parentElement.querySelector('.no_telp').innerHTML;
                    window.open("https://wa.me/" + noTelp + "?text=Selamat akun anda berhasil di verifikasi, untuk selanjutnya anda sudah dapat login pada sistem " + origin + "/login", '_blank');
                });
            } else {
                alert('Tidak ada data yang dipilih');
            }
        });
    });
</script>

<?= $this->endSection(); ?>