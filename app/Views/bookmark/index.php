<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.bookmark-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 24px;
    padding: 20px;
}

.bookmark-card {
    background: #EDF4F2;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    padding: 12px;
    position: relative;
    overflow: hidden;
    transition: transform 0.2s ease;
    font-size: 14px;
    margin-top: 70px; /* hilangkan margin kiri/atas yang berlebihan */
}

.bookmark-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    background: #CEE6F2;
}

.bookmark-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 8px;
}

.bookmark-card h4 {
    margin: 10px 0 6px;
    font-size: 16px;
    color: #333;
}

.bookmark-card p {
    margin: 0;
    font-size: 14px;
    color: #666;
}

.bookmark-card .icons {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    flex-direction: row;
    gap: 4px;
}

.bookmark-card .icons form {
    margin: 0;
}

.bookmark-card .icons button {
    font-size: 20px;
    color: #ff5e5e;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    transition: transform 0.2s ease;
}

.bookmark-card .icons button:hover {
    transform: scale(1.2) rotate(20deg);
}

</style>
<body>
    <?= $this->include('layout/navbar') ?> 
        <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?> 

    <div class="bookmark-grid">
        <?php foreach ($tugas as $t): ?>  
        <div class="bookmark-card">
            <!-- Tombol hapus bookmark di pojok atas -->
            <div class="icons" style="text-align: right;">
                <form action="<?= base_url('bookmark/hapus/' . $t['ebook_id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" title="Hapus Bookmark" style="background: none; border: none; cursor: pointer;">❌</button>
                </form>
            </div>
            <!-- Isi card -->
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
            
            <h4><?= esc($t['title']) ?></h4>
            <p>👤 <?= esc($t['uploader']) ?></p>
            <p><a href="<?= base_url('tugas/' . $t['id']) ?>">📘 Lihat Detail</a></p>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>