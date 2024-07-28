<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .judul {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
        margin-top: 30px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    ol {
        padding-left: 20px;
    }

    ol li {
        margin-bottom: 10px;
    }

    .gambar-cok {
        display: block;
        max-width: 75%;
        height: auto;
        margin: 10px 0;
    }

    .btn-group-toggle .btn {
        border-radius: 0;
    }

    .btn-group-toggle .btn.active {
        background-color: #3b3b98;
        color: white;
    }

    .btn-group-toggle input[type="radio"] {
        display: none;
    }
</style>

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5" style="max-width: 800px;">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-primary active" id="btn-donasi">
                        <input type="radio" name="options" autocomplete="off" checked> Panduan Donasi
                    </label>
                    <label class="btn btn-outline-primary" id="btn-zakat">
                        <input type="radio" name="options" autocomplete="off"> Panduan Bayar Zakat
                    </label>
                </div>
                <div id="panduan-donasi" class="mt-3">
                    <h2 class="judul">Panduan Donasi</h2>
                    <div class="card mb-3">
                        <div class="card-body">
                            <ol>
                                <li>Membuka Halaman Web Sistem Masjid</li>
                                <li>Memilih salah satu profil masjid</li>
                                <li>Menekan tombol donasi/pembayaran zakat</li>
                                <li>
                                    <p>Perhatikan no rekening masjid yang berada dibawah formulir</p>
                                    <img src="<?= base_url(); ?>/panduanimg/norek2.jpg" class="gambar-cok" alt="Masjid Profile">
                                </li>
                                <li>Kemudian isi formulir yang sudah di sediakan dengan melampirkan bukti transaksi.</li>
                                <li>
                                    <p>Perhatikan jenis donasi</p>
                                    <img src="<?= base_url(); ?>/panduanimg/pilihandonasi2.jpg" class="gambar-cok" alt="Jenis Donasi">
                                    <p>Donasi Pembangunan nantinya akan masuk ke kas masjid sedangkan donasi anak yatim saldo akan masuk ke pencatatan infak anak yatim.</p>
                                </li>
                                <li> Klik tombol donasi, donasi berhasil proses selanjutnya pengurus akan melakuan pengecekan saldo masuk </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div id="panduan-zakat" class="mt-3" style="display: none;">
                    <h2 class="judul">Panduan Pembayaran Zakat</h2>
                    <div class="card mb-3">
                        <div class="card-body">
                            <ol>
                                <li>Membuka Halaman Web Sistem Masjid</li>
                                <li>Memilih salah satu profil masjid</li>
                                <li>Menekan tombol donasi/pembayaran zakat</li>
                                <li>
                                    <p>Perhatikan no rekening masjid yang berada dibawah formulir</p>
                                    <img src="<?= base_url(); ?>/panduanimg/norek2.jpg" class="gambar-cok" alt="Masjid Profile">
                                </li>
                                <li>Kemudian pergi ke halaman pembayaran zakat dengan menekan link "Ingin membayar zakat"</li>
                                <li>
                                    <p>Perhatikan jenis beras</p>
                                    <img src="<?= base_url(); ?>/panduanimg/pilihberas.jpg" class="gambar-cok" alt="Jenis Donasi">
                                    <p>Jenis beras di input oleh pengurus berdasarkan daerah atau kebutuhan masyarakat sehari hari. Pembayaran dilakukan berdasarkan nilai nominal beras dalam 2,5-3,5kg sesuai ketentuan Lembaga Baznas <a href="https://baznas.go.id/zakatfitrah">https://baznas.go.id/zakatfitrah</a></p>
                                </li>
                                <li> Kemudian isi formulir yang sudah di sediakan dengan melanpirkan bukti transaksi</li>
                                <li> Klik tombol Bayar, pembayaran berhasil proses selanjutnya pengurus akan dilakukan pengecekan saldo masuk </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('btn-donasi').addEventListener('click', function() {
        document.getElementById('panduan-donasi').style.display = 'block';
        document.getElementById('panduan-zakat').style.display = 'none';
        this.classList.add('active');
        document.getElementById('btn-zakat').classList.remove('active');
    });

    document.getElementById('btn-zakat').addEventListener('click', function() {
        document.getElementById('panduan-donasi').style.display = 'none';
        document.getElementById('panduan-zakat').style.display = 'block';
        this.classList.add('active');
        document.getElementById('btn-donasi').classList.remove('active');
    });
</script>

<?= $this->endSection('content'); ?>