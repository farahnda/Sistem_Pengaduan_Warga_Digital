<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center mb-4">
        <h2>Selamat Datang, <?= $this->session->userdata('username'); ?> di Sistem Pengaduan Warga Digital</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-center">Pilih fitur di bawah ini untuk melanjutkan:</p>
            
            <div class="d-flex justify-content-center">
                <a href="<?= base_url('warga/form_pengaduan') ?>" class="btn btn-primary btn-lg mx-2">Form Pengaduan</a>
                <a href="<?= base_url('warga/list_pengaduan') ?>" class="btn btn-success btn-lg mx-2">List Pengaduan</a>
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
