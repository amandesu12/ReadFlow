<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas - RedFlow</title>
</head>
<body>

    <style>
        .upload-main-container {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: flex-start;
            margin-top: 32px;
        }
        .form-section {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 32px 28px;
            min-width: 280px;
            max-width: 340px;
            width: 100%;
            flex: 1 1 320px;
            box-sizing: border-box;
        }
        .cover-preview-section {
            background: #fafbfc;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 32px 18px;
            text-align: center;
            min-width: 220px;
            max-width: 280px;
            flex: 0 0 250px;
            box-sizing: border-box;
        }
        .cover-preview-section img {
            width: 100%;
            max-width: 250px;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
            margin-top: 12px;
        }
        .form-section label {
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }
        .form-section input[type="text"],
        .form-section textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 15px;
            background: #f9fafb;
            transition: border 0.2s;
        }
        .form-section input[type="text"]:focus,
        .form-section textarea:focus {
            border: 1.5px solid #2563eb;
            outline: none;
            background: #fff;
        }
        .form-section input[type="file"] {
            margin-bottom: 16px;
        }
        .error-message {
            color: #fff;
            background: #ef4444;
            padding: 10px 18px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 15px;
        }
        .upload-btn {
            background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 28px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
            transition: background 0.2s, transform 0.1s;
        }
        .upload-btn:hover {
            background: linear-gradient(90deg, #1e40af 0%, #2563eb 100%);
            transform: translateY(-2px) scale(1.03);
        }
        .back-btn {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 10px 22px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, border 0.2s;
        }
        .back-btn:hover {
            background: #e5e7eb;
            border: 1px solid #2563eb;
            color: #1e40af;
        }
        #coverPreviewDefault {
            width: 100%;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #f3f4f6;
            border-radius: 8px;
            color: #6b7280;
            font-size: 15px;
        }
    </style>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-message"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <div class="upload-main-container">
        <!-- Kolom Kiri: Preview Cover -->
        <div class="cover-preview-section">
            <label style="font-weight:600; font-size:16px; margin-bottom:10px; display:block;">Preview Cover</label>
            <?php if (isset($coverUrl) && $coverUrl): ?>
            <img 
                id="coverPreview" 
                src="<?= esc($coverUrl) ?>" 
                alt="Preview Cover"
            >
            <?php else: ?>
            <div id="coverPreviewDefault">
                <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom:10px;">
                <rect width="48" height="48" rx="8" fill="#e5e7eb"/>
                <path d="M14 34v-2a4 4 0 0 1 4-4h12a4 4 0 0 1 4 4v2" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"/>
                <circle cx="24" cy="20" r="4" stroke="#9ca3af" stroke-width="2"/>
                </svg>
                <span style="font-size:15px; color:#6b7280;">Belum ada cover</span>
                <span style="font-size:13px; color:#9ca3af;">Preview gambar akan muncul di sini</span>
            </div>
            <img 
                id="coverPreview" 
                src="" 
                alt="Preview Cover" 
                style="display:none;"
            >
            <?php endif; ?>
        </div>
        <!-- Kolom Kanan: Form Edit Data -->
        <div class="form-section">
            <form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="coverInput">Upload Cover (opsional)</label>
                    <input type="file" name="cover" accept="image/*" id="coverInput">
                </div>
                <div>
                    <label for="title">Judul Tugas</label>
                    <input type="text" name="title" id="title" placeholder="Judul Tugas" required>
                </div>
                <div>
                    <label for="description">Deskripsi singkat</label>
                    <textarea name="description" id="description" placeholder="Deskripsi singkat" rows="4"></textarea>
                </div>
                <div>
                    <label for="file">Upload File PDF</label>
                    <input type="file" name="file" accept=".pdf" id="file" required class="custom-file-input">
                </div>
                <div style="display: flex; gap: 12px; justify-content: flex-end; align-items: center; margin-top: 18px;">
                    <button type="button" onclick="window.history.back()" class="back-btn">Kembali</button>
                    <button type="submit" class="upload-btn">Upload</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview gambar cover saat user memilih file
        document.getElementById('coverInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            const coverPreview = document.getElementById('coverPreview');
            const coverPreviewDefault = document.getElementById('coverPreviewDefault');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    coverPreview.src = e.target.result;
                    coverPreview.style.display = 'block';
                    if (coverPreviewDefault) coverPreviewDefault.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                coverPreview.src = '';
                coverPreview.style.display = 'none';
                if (coverPreviewDefault) coverPreviewDefault.style.display = 'flex';
            }
        });
    </script>
</body>
</html>
