<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link_tag rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #EDF4F2;
}
.container {
    display: flex;
    min-height: 100vh;
}
.sidebar {
    width: 220px;
    background: #EDF4F2;
    padding: 30px 20px;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    height: 100vh;
    box-shadow: 2px 0 10px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.user-section {
    text-align: center;
}
.profile-pic {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 10px;
}
.welcome {
    font-size: 14px;
    color: #31473A;
    margin: 0;
}
.username {
    font-weight: bold;
    color: #31473A;
    margin-top: 4px;
}
.menu-links a {
    display: flex;
    align-items: center;
    color: #31473A;
    text-decoration: none;
    padding: 10px 5px;
    border-radius: 8px;
    transition: background 0.2s;
    margin-top: 10px;
}
.menu-links a:hover {
    background-color: #D7EAE3;
}
.menu-links .icon {
    margin-right: 10px;
    font-size: 18px;
}
.footer-note {
    text-align: center;
    font-size: 12px;
    color: #666;
}
.main-content {
    flex-grow: 1;
    background: #F6FBF9;
}
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    padding: 0 20px;
    position: relative;
}

.section-header h3 {
    font-size: 20px;
    color: #31473A;
}

.section-header .see-all {
    font-size: 14px;
    color: #31473A;
    text-decoration: none;
    font-weight: bold;
    margin-left: auto;
    position: absolute;
    right: 20px;
}

.famous-uploaders ul {
    padding-left: 20px;
}
.no-cover-placeholder{
    width: 60px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f8d7da 0%, #f1f3f5 100%);
    border-radius: 8px;
    margin-bottom: 10px;
    color: #b0b0b0;
    font-size: 24px;
    flex-direction: column;
}
</style>
</head>
<body>
<?= $this->extend('layout/navbar') ?>

<?= $this->section('content') ?>
<div class="container">

<!-- REKOMENDASI -->
<section class="recommendation-section">
    <div class="recommendation-header">
    <h3>📚 Rekomendasi</h3>
        <a href="<?= base_url('/galeri') ?>" class="see-all">See All</a>
    </div>
    <div class="recommendation-cards">
    <?php if (!empty($recommendations)): ?>
        <?php foreach ($recommendations as $r): ?>
        <div class="recommendation-card">
            <?php if (!empty($r['cover'])): ?>
                <img src="<?= base_url('covers/' . esc($r['cover'])) ?>" alt="Cover">
            <?php else: ?>
                <div class="no-cover-placeholder">
                        <span style="font-size: 40px; margin-bottom: 8px;">📄</span>
                    </div>
            <?php endif; ?>
            <div class="card-info">
                <h4><?= esc($r['title']) ?></h4>
                <p><?= esc($r['description']) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada rekomendasi saat ini.</p>
    <?php endif; ?>
    </div>
    </section>
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <section class="new-release">
            <div class="section-header" style="position: relative;">
                <h3 style="margin-right: 100px;">✨ Rilis Terbaru</h3>
                <a href="<?= base_url('galeri') ?>" class="see-all" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">See All</a>
            </div>
            <div class="new-release-grid">
                <?php if (!empty($terbaru)): ?>
                    <?php foreach ($terbaru as $item): ?>
                        <a href="<?= base_url('tugas/' . $item['id']) ?>" class="card-link">
                            <div class="card new-release-card">
                                <div class="new-release-img-wrapper">
                                    <img src="<?= base_url('covers/' . esc($item['cover'])) ?>" alt="Cover">
                                    
                                </div>
                                <div class="new-release-info">
                                    <h4><?= esc($item['title']) ?></h4>
                                    <p><?= esc(character_limiter($item['description'], 70)) ?></p>
                                    <div class="uploader-info">
                                        <span>👤 <?= esc($item['uploader'] ?? 'Anonim') ?></span>
                                        <span>📁 <?= esc($item['genre'] ?? 'Umum') ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="padding: 12px;">Belum ada tugas terbaru.</p>
                <?php endif; ?>
            </div>
        </section>

        <style>
        .new-release {
            background: #fff;
            border-radius: 18px;
            padding: 28px 24px 18px 24px;
            margin-bottom: 28px;
            box-shadow: 0 4px 18px rgba(49,71,58,0.07);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        .new-release-grid {
            display: flex;
            gap: 22px;
            overflow-x: auto;
            padding-bottom: 8px;
            margin-top: 10px;
            scrollbar-width: none; /* Firefox */
        }
        .new-release-grid::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            min-width: 240px;
        }
        .card-link:hover .new-release-card {
            box-shadow: 0 8px 20px rgba(49,71,58,0.13);
            transform: translateY(-3px) scale(1.02);
            transition: 0.2s;
        }
        .new-release-card {
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f6fbf9 60%, #e3ede8 100%);
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(49,71,58,0.08);
            transition: box-shadow 0.2s, transform 0.2s;
            overflow: hidden;
            min-width: 220px;
            max-width: 260px;
            height: 100%;
        }
        .new-release-img-wrapper {
            width: 100%;
            height: 170px;
            background: #e3ede8;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .new-release-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .new-release-info {
            padding: 16px 14px 12px 14px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .new-release-info h4 {
            margin: 0 0 4px 0;
            color: #31473A;
            font-size: 17px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .new-release-info p {
            margin: 0;
            color: #4B6354;
            font-size: 13px;
            line-height: 1.5;
            max-height: 2.8em;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            --webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .uploader-info {
            display: flex;
            gap: 12px;
            font-size: 12px;
            color: #7a8b7f;
            margin-top: 4px;
        }
        @media (max-width: 900px) {
            .new-release {
            padding: 16px 6px 10px 6px;
            }
            .new-release-grid {
            gap: 12px;
            }
            .new-release-card {
            min-width: 170px;
            max-width: 180px;
            }
            .new-release-img-wrapper {
            height: 110px;
            }
            .new-release-info h4 {
            font-size: 14px;
            }
            .new-release-info p {
            font-size: 11px;
            }
        }
        /* REKOMENDASI */
        .recommendation-section {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #EDF4F2;
            padding: 30px;
            border-radius: 16px;
            margin-left: 220px; /* Sidebar width */
            margin-top: 60px; /* Navbar height */
        }

        .recommendation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .recommendation-header h2 {
            color: #EDF4F2;
            font-size: 20px;
        }

        .recommendation-header .see-all {
            font-size: 14px;
            color: #31473A;
            text-decoration: none;
            font-weight: bold;
        }

        .recommendation-header .see-all:hover {
            text-decoration: underline;
        }

        .recommendation-cards {
            display: flex;
            overflow-x: auto;
            gap: 24px;
            padding-bottom: 15px;
            scrollbar-width: none; /* Firefox */
        }
        .recommendation-cards::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .recommendation-card {
            min-width: 240px;
            background:#525252FF;
            color: white;
            border-radius: 16px;
            display: flex;
            padding: 14px;
            gap: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .recommendation-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02); 

        }

        .recommendation-card img {
            width: 60px;
            height: 90px;
            border-radius: 5px;
            margin-right: 12px;
        }

        .recommendation-card .card-info h4 {
            margin: 0;
            font-size: 16px;
        }

        .recommendation-card .card-info p {
            font-size: 12px;
            margin-top: 6px;
            opacity: 0.9;
        }
        </style>
        <br>
        <section class="last-read-section">
            <div class="section-header" style="position: relative;">
                <h3 style="margin-right: 100px;">📖 Last Read</h3>
                <a href="<?= base_url('galeri') ?>" class="see-all" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">See All</a>
            </div>
            <div class="last-read-grid">
                <?php if (!empty($lastRead)): ?>
                    <?php foreach ($lastRead as $item): ?>
                        <div class="last-read-card">
                            <img src="<?= base_url('covers/' . esc($item['cover'] ?? 'default.jpg')) ?>" alt="Cover">
                            <div class="info">
                                <h4><?= esc($item['title']) ?></h4>
                                <p><?= esc(character_limiter($item['description'], 50)) ?></p>
                                <span class="genre">📁 <?= esc($item['genre'] ?? 'General') ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="padding: 12px;">Belum ada data yang dibaca terakhir.</p>
                <?php endif; ?>
            </div>
        </section>
            <br>
            <section class="famous-uploaders">
                <h2>Uploader Aktif</h2>
                <ul>
                    <?php foreach ($uploaders as $u): ?>
                    <li><?= esc($u['name']) ?> (<?= $u['jumlah'] ?> tugas)</li>
                    <?php endforeach; ?>
                </ul>
            </section>
    </main>
</div>

<?= $this->endSection() ?>
</body>
</html>
