<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <h2 class="text-center">Ubah Status Pengaduan</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <<form method="post">
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="baru" <?= ($pengaduan['status'] == 'baru') ? 'selected' : '' ?>>Baru</option>
            <option value="diproses" <?= ($pengaduan['status'] == 'diproses') ? 'selected' : '' ?>>Diproses</option>
            <option value="selesai" <?= ($pengaduan['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
        </select>
    </div>

    <div class="form-group">
        <label for="respon">Respon</label>
        <textarea name="respon" id="respon" class="form-control" rows="4" placeholder="Tuliskan respon terhadap pengaduan..."><?= isset($pengaduan['respon']) ? $pengaduan['respon'] : '' ?></textarea>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Ubah Status & Simpan Respon</button>
</form>

    <a href="<?= base_url('admin') ?>" class="btn btn-secondary mt-3">Kembali ke Daftar Pengaduan</a>
</div>
<?php $this->load->view('templates/footer'); ?>
