<?= $this->extend('layout/supertemplate'); ?>
<?= $this->section('content'); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>
<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendaftaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10 Akun</div>
                    </div>
                    <div class="col-auto ml-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1 Akun</div>
                    </div>
                    <div class="col-auto ml-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Masjid Terdaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">20 Masjid</div>
                    </div>
                    <div class="col-auto ml-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-2 mb-2 px-3" style="min-height: 100vh;"> <!-- Menambahkan padding horizontal -->

    </div>




</div>
<?= $this->endSection(); ?>