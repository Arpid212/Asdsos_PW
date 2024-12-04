<div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($barang['nama_barang']); ?></h5>
    <p class="card-text"><?php echo htmlspecialchars($barang['deskripsi']); ?></p>
    <p class="card-text">Harga Awal: Rp <?php echo number_format($barang['harga_awal'], 0, ',', '.'); ?></p>
    <p class="card-text">Batas Waktu: <?php echo $barang['batas_waktu']; ?></p>

    <form method="POST">
        <div class="mb-3">
            <label for="penawaran_harga" class="form-label">Harga Penawaran</label>
            <input type="number" class="form-control" id="penawaran_harga" name="penawaran_harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Penawaran</button>
    </form>

    <?php if (isset($last_bid)): ?>
        <p>Penawaran Tertinggi Saat Ini: Rp <?php echo number_format($last_bid['penawaran_harga'], 0, ',', '.'); ?> oleh User ID: <?php echo $last_bid['id_user']; ?></p>
    <?php endif; ?>
</div>
