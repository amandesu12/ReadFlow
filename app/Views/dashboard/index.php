<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Saya - RedFlow</title>
    <style>
        body {
            background-color: #f1f3f5; /* abu muda pastel */
            font-family: 'Segoe UI', sans-serif;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 16px;
            margin-top: 20px;
            margin-left: 260px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 0 0 8px;
            font-size: 18px;
            color: #333;
        }

        .card p {
            margin: 4px 0;
            font-size: 14px;
            color: #555;
        }

        .card .actions {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .card .actions a {
            font-size: 14px;
            color: #F5767DFF;
            text-decoration: none;
        }

        .card .actions a:hover {
            text-decoration: underline;
        }
        .btn-upload {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #FF9B9BFF; /* soft pink pastel */
            color: #333;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 1000;
        }

        .btn-upload:hover {
            background-color: #ffcfcf;
            transform: scale(1.05);
            
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        a {
            color: #F5767DFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
</style>
</head>
<body>

<?= $this->include('layout/navbar') ?>
    <h2>Dashboard Saya</h2>
    <a href="/upload" class="btn-upload">  📤  </a>
<hr><br>

<?php if (empty($tugas)): ?>
    <p>Belum ada tugas yang diupload.</p>
<?php else: ?>
    <div class="grid">
        <?php foreach ($tugas as $t): ?>
            <div class="card">
                <!-- COVER -->
                <?php if (!empty($t['cover'])): ?>
                    <img src="<?= base_url('covers/' . esc($t['cover'])) ?>" alt="Cover">
                <?php else: ?>
                    <div style="
                        width: 100%;
                        height: 160px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background: linear-gradient(135deg, #f8d7da 0%, #f1f3f5 100%);
                        border-radius: 8px;
                        margin-bottom: 10px;
                        color: #b0b0b0;
                        font-size: 48px;
                        flex-direction: column;
                    ">
                        <span style="font-size: 40px; margin-bottom: 8px;">📄</span>
                        <span style="font-size: 14px; color: #b0b0b0;">Tidak ada cover</span>
                    </div>
                <?php endif; ?>

                <!-- ISI -->
                <h3><?= esc($t['title']) ?></h3>
                <p><?= esc($t['description']) ?></p>
                <p><a href="<?= base_url('uploads/' . $t['file']) ?>" target="_blank">📄 Lihat File</a></p>

                <!-- Aksi -->
                <div class="actions">
                    <a href="/tugas/edit/<?= $t['id'] ?>">✏️ Edit</a>
                    <a href="/tugas/delete/<?= $t['id'] ?>" onclick="return confirm('Yakin ingin menghapus tugas ini?')">🗑️ Hapus</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>
