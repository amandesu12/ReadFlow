<!DOCTYPE html>
<html>
<head>
    <title><?= esc($tugas['title']) ?> - RedFlow</title>
    <style>
        body {
            background: #fef6f0;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
        }

        .container {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        h2 {
            color: #ff6f61;
        }

        p {
            line-height: 1.6;
        }

        iframe {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 20px;
        }

        a {
            color: #ff6f61;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <?= $this->section('content') ?>
    <div class="container">
        <h2><?= esc($tugas['title']) ?></h2>
        <p><strong>Diupload:</strong> <?= $tugas['created_at'] ?></p>
        <p><?= esc($tugas['description']) ?></p>

        <h4>Preview File:</h4>
        <iframe src="<?= base_url('uploads/' . $tugas['file']) ?>"></iframe>

        <p><a href="<?= base_url('galeri') ?>">← Kembali ke Galeri</a></p>
    </div>
</body>
</html>
