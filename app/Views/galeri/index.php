<!DOCTYPE html>
<html>
<head>
    <title>Galeri Tugas - RedFlow</title>
    <style>
.explore-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    justify-content: flex-start;
    padding: 16px;
    margin-left: 260px; /* Adjusted to account for sidebar width */
    margin-top: 50px; /* Adjusted to account for navbar height */
}

.explore-card {
    position: relative;
    width: 170px;
    height: 220px;
    background: #EDF4F2;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    transition: transform 0.2s;
    font-size: 13px;
}

.explore-card:hover {
    transform: scale(1.02);
}

.explore-card img {
    width: max(100%, 170px);
    height: 160px;
    object-fit: cover;
    display: block;
}

/* ICON POJOK ATAS */
.icon-top {
    position: absolute;
    top: 6px;
    right: 6px;
    display: flex;
    gap: 4px;
}

.icon-top form,
.icon-top a {
    font-size: 13px;
    background: rgba(255, 255, 255, 0.8);
    padding: 2px 4px;
    border-radius: 4px;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

/* VIEWS */
.view-counter {
    font-size: 11px;
    color: #666;
    padding: 4px 8px 0;
}

/* TITLE */
.explore-card h4 {
    margin: 4px 8px 6px;
    font-size: 13px;
    line-height: 1.2em;
    height: 2.4em;
    overflow: hidden;
    text-align: center;
    
}
</style>

</head>
<body>
    <?= $this->include('layout/navbar') ?>

<h3 style="text-align: center;">🌀 Eksplorasi Tugas Mahasiswa</h3>

<div class="explore-grid">
    <?php foreach ($tugas as $t): ?>
        <div class="explore-card">

            <!-- COVER -->
            <?php if (!empty($t['cover'])): ?>
                <img src="<?= base_url('covers/' . $t['cover']) ?>" alt="Cover">
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

            <!-- VIEWS -->
            <div class="view-counter">
                👁️ <?= esc($t['views'] ?? 0) ?> kali
            </div>

            <!-- ICON POJOK ATAS -->
            <div class="icon-top">
                <a href="<?= base_url('favorite/tambah/' . $t['id']) ?>" title="Sukai">❤️</a>
                <form action="<?= base_url('bookmark/tambah/' . $t['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <button style="cursor: pointer;" title="Bookmark">🔖</button>
                </form>
            </div>

            <!-- TITLE -->
            <h4><?= esc($t['title']) ?></h4>

        </div>
    <?php endforeach; ?>
</div>
</body>
</html>